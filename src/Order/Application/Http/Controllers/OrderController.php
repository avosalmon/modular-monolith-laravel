<?php

namespace Accredify\Order\Application\Http\Controllers;

use Accredify\Order\Application\Http\Requests\StoreOrderRequest;
use Accredify\Order\Application\Http\Requests\UpdateOrderRequest;
use Accredify\Order\Application\Http\Resources\Order as OrderResource;
use Accredify\Order\Domain\Models\Order;
use App\Http\Controllers\Controller;
use App\Product\Domain\Contracts\ProductRepository;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);

        return OrderResource::collection($orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Accredify\Order\Application\Http\Requests\StoreOrderRequest  $request
     * @param  \App\Product\Domain\Contracts\ProductRepository  $productRepository
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request, ProductRepository $productRepository)
    {
        $validated = $request->validated();

        // check product inventory
        $product = $productRepository->findById($validated['product_id']);

        // deduct product stock from inventory

        // create order

        // make payment
    }

    /**
     * Display the specified resource.
     *
     * @param  \Accredify\Order\Domain\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Accredify\Order\Application\Http\Requests\UpdateOrderRequest  $request
     * @param  \Accredify\Order\Domain\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }
}
