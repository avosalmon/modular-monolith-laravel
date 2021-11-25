<?php

declare(strict_types=1);

namespace Accredify\Product\Infrastructure\Repositories;

use Accredify\Product\Application\Exceptions\InactiveProductException;
use Accredify\Product\Application\Exceptions\OutOfStockException;
use Accredify\Product\Domain\Models\Product;
use Accredify\Product\Domain\Contracts\ProductRepositoryInterface;

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
     * @throws \Accredify\Product\Application\Exceptions\OutOfStockException
     * @throws \Accredify\Product\Application\Exceptions\InactiveProductException
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
