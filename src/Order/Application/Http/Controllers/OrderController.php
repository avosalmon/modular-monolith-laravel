<?php

declare(strict_types=1);

namespace Laracon\Order\Application\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Laracon\Inventory\Contracts\ProductService;
use Laracon\Order\Application\Http\Requests\StoreOrderRequest;
use Laracon\Order\Application\Http\Resources\Order as OrderResource;
use Laracon\Order\Contracts\Events\OrderFulfilled;
use Laracon\Order\Domain\Models\Cart;
use Laracon\Order\Domain\Models\CartItem;
use Laracon\Order\Domain\Models\Order;
use Laracon\Payment\Contracts\PaymentService;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Laracon\Inventory\Contracts\ProductService  $productService
     * @param  \Laracon\Payment\Contracts\PaymentService  $paymentService
     * @return void
     */
    public function __construct(
        private ProductService $productService,
        private PaymentService $paymentService
    ) {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Laracon\Order\Application\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $cart = Cart::with('cartItems')->findOrFail($request->cart_id);
        $order = new Order(['user_id' => $request->user()->id]);

        try {
            DB::transaction(function () use ($order, $cart) {
                $cart->cartItems->each(function (CartItem $cartItem) use ($order) {
                    $this->productService->decrementStock($cartItem->product_id, $cartItem->quantity);
                    $product = $this->productService->getProductById($cartItem->product_id);
                    $order->addOrderLine($product, $cartItem->quantity);
                });

                $order->checkout();

                $this->paymentService->charge($order->id, $order->total_amount);
            });
        } catch (\Exception $e) {
            abort(Response::HTTP_BAD_REQUEST, trans('order::errors.failed'));
        }

        OrderFulfilled::dispatch($order->id);

        return new OrderResource($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Laracon\Order\Domain\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $this->authorize('view', $order);

        return new OrderResource($order);
    }
}
