<?php

declare(strict_types=1);

namespace Laracon\Inventory\Domain\Contracts\Command;

interface ProductCommand
{
    /**
     * Decrement product stock.
     *
     * @param integer $productId
     * @param integer $quantity
     * @return void
     * @throws ProductNotFoundException
     * @throws OutOfStockException
     * @throws InactiveProductException
     */
    public function decrementStock(int $productId, int $quantity): void;
}
