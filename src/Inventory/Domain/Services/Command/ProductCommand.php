<?php

declare(strict_types=1);

namespace Laracon\Inventory\Domain\Services\Command;

use Laracon\Inventory\Domain\Models\Product;
use Laracon\Inventory\Application\Exceptions\OutOfStockException;
use Laracon\Inventory\Application\Exceptions\InactiveProductException;
use Laracon\Inventory\Domain\Contracts\Command\ProductCommand as ProductCommandContract;
use Laracon\Inventory\Domain\Exceptions\ProductNotFoundException;

class ProductCommand implements ProductCommandContract
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
    public function decrementStock(int $productId, int $quantity): void
    {
        $product = Product::find($productId);

        if (!$product) {
            throw new ProductNotFoundException($productId);
        }

        if ($product->stock < $quantity) {
            throw new OutOfStockException($product->id);
        }

        if (!$product->is_active) {
            throw new InactiveProductException($product->id);
        }

        $product->decrement('stock', $quantity);
    }
}
