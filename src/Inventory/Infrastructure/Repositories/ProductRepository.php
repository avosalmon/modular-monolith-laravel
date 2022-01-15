<?php

declare(strict_types=1);

namespace Laracon\Inventory\Infrastructure\Repositories;

use Laracon\Inventory\Application\Exceptions\InactiveProductException;
use Laracon\Inventory\Application\Exceptions\OutOfStockException;
use Laracon\Inventory\Domain\Models\Product;
use Laracon\Inventory\Domain\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Get product price by product id.
     *
     * @param int $id
     * @return int
     */
    public function getPrice(int $id): int
    {
        return Product::findOrFail($id)->price;
    }

    /**
     * Decrement product stock.
     *
     * @param integer $id
     * @param integer $quantity
     * @return void
     * @throws \Laracon\Inventory\Application\Exceptions\OutOfStockException
     * @throws \Laracon\Inventory\Application\Exceptions\InactiveProductException
     */
    public function decrementStock(int $id, int $quantity): void
    {
        $product = Product::findOrFail($id);

        if ($product->stock < $quantity) {
            throw new OutOfStockException($product->id);
        }

        if (!$product->is_active) {
            throw new InactiveProductException($product->id);
        }

        $product->decrement('stock', $quantity);
    }
}
