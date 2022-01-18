<?php

namespace Laracon\Inventory\Contracts;

use Laracon\Inventory\Contracts\DataTransferObjects\Product as ProductDto;

interface ProductService
{
    /**
     * Get product by product id.
     *
     * @param int $id
     * @return \Laracon\Inventory\Contracts\DataTransferObjects\Product
     * @throws \Laracon\Inventory\Contracts\ExceptionsProductNotFoundException
     */
    public function getProductById(int $productId): ProductDto;

    /**
     * Decrement product stock.
     *
     * @param integer $productId
     * @param integer $quantity
     * @return void
     * @throws \Laracon\Inventory\Contracts\ExceptionsProductNotFoundException
     * @throws \Laracon\Inventory\Contracts\ExceptionsOutOfStockException
     * @throws \Laracon\Inventory\Contracts\ExceptionsInactiveProductException
     */
    public function decrementStock(int $productId, int $quantity): void;
}
