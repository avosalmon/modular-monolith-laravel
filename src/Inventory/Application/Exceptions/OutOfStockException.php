<?php

declare(strict_types=1);

namespace Laracon\Inventory\Application\Exceptions;

use Exception;

class OutOfStockException extends Exception
{
    public function __construct(private int $productId)
    {
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json([
            'message' => 'Product is out of stock.',
            'product_id' => $this->productId,
        ], 400);
    }
}
