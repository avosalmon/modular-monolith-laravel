<?php

namespace Laracon\Product\Domain\Contracts;

use Laracon\Product\Domain\Contracts\DTOs\ProductInventory;

interface ProductRepositoryInterface
{
    /**
     * Get product price by product id.
     *
     * @param int $id
     * @return int
     */
    public function getPrice(int $id): int;

    /**
     * Decrement product stock.
     *
     * @param integer $id
     * @param integer $quantity
     * @return void
     * @throws \Laracon\Product\Application\Exceptions\OutOfStockException
     */
    public function decrementStock(int $id, int $quantity): void;
}
