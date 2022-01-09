<?php

declare(strict_types=1);

namespace Laracon\Product\Infrastructure\Repositories;

use Laracon\Product\Application\Exceptions\InactiveProductException;
use Laracon\Product\Application\Exceptions\OutOfStockException;
use Laracon\Product\Domain\Models\Product;
use Laracon\Product\Domain\Contracts\ProductRepositoryInterface;

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
     * @throws \Laracon\Product\Application\Exceptions\OutOfStockException
     * @throws \Laracon\Product\Application\Exceptions\InactiveProductException
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
