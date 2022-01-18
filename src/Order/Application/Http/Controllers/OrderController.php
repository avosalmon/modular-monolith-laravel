<?php

declare(strict_types=1);

namespace Laracon\Order\Application\Http\Controllers;

use Laracon\Order\Application\Http\Requests\StoreOrderRequest;
use Laracon\Order\Application\Http\Resources\Order as OrderResource;
use Laracon\Order\Domain\Models\Order;
use Laracon\Payment\Domain\Contracts\PaymentServiceInterface;
use Laracon\Inventory\Domain\Contracts\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Laracon\Inventory\Domain\Contracts\Command\ProductCommand;
use Laracon\Inventory\Domain\Contracts\Query\ProductQuery;
use Laracon\Order\Domain\Models\CartItem;
use Laracon\Order\Domain\Models\ShoppingCart;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Laracon\Inventory\Domain\Contracts\ProductRepositoryInterface  $productRepository
     * @param  \Laracon\Payment\Domain\Contracts\PaymentServiceInterface  $paymentService
     * @return void
     */
    public function __construct(
        private ProductQuery $productQuery,
        private ProductCommand $productCommand,
        private PaymentServiceInterface $paymentService
    ) {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Laracon\Order\Application\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order = null;
        $cart = ShoppingCart::findOrFail($request->cart_id);

        try {
            DB::transaction(function () use ($cart, $request) {
                $order = new Order([
                    'user_id' => $request->user()->id,
                    'shipping_address_id' => $request->shipping_address_id,
                ]);

                $cart->cartItems()->each(function (CartItem $cartItem) use ($order) {
                    $this->productCommand->decrementStock($cartItem->product_id, $cartItem->quantity);
                    $product = $this->productQuery->getProductById($cartItem->product_id);
                    $order->addOrderLine($product, $cartItem->quantity);
                });

                $order->checkout();

                $this->paymentService->pay(
                    $order->id,
                    $order->total_amount,
                    $request->payment_method
                );
            });
        } catch (\Throwable $th) {
            // return error response
        }

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
        return new OrderResource($order);
    }
}
