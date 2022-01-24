<?php

namespace Laracon\Inventory\Contracts;

use Laracon\Inventory\Contracts\DataTransferObjects\ProductDto;

interface ProductService
{
    /**
     * Decrement product stock.
     *
     * @param int $productId
     * @param int $quantity
     * @return void
     * @throws \Laracon\Inventory\Contracts\Exceptions\ProductNotFoundException
     * @throws \Laracon\Inventory\Contracts\Exceptions\OutOfStockException
     * @throws \Laracon\Inventory\Contracts\Exceptions\InactiveProductException
     */
    public function decrementStock(int $productId, int $quantity): void;

    /**
     * Get product by product id.
     *
     * @param int $id
     * @return \Laracon\Inventory\Contracts\DataTransferObjects\ProductDto
     * @throws \Laracon\Inventory\Contracts\Exceptions\ProductNotFoundException
     */
    public function getProductById(int $productId): ProductDto;
}
