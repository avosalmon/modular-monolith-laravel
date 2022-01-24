<?php

declare(strict_types=1);

namespace Laracon\Inventory\Infrastructure\Services;

use Laracon\Inventory\Contracts\DataTransferObjects\ProductDto;
use Laracon\Inventory\Contracts\Exceptions\{InactiveProductException, OutOfStockException, ProductNotFoundException};
use Laracon\Inventory\Contracts\ProductService as ProductServiceContract;
use Laracon\Inventory\Domain\Models\Product;

class ProductService implements ProductServiceContract
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
    public function decrementStock(int $productId, int $quantity): void
    {
        $product = Product::find($productId);

        if (!$product) {
            throw new ProductNotFoundException($productId);
        }

        if ($product->stock < $quantity) {
            throw new OutOfStockException($productId);
        }

        if (!$product->is_active) {
            throw new InactiveProductException($productId);
        }

        $product->decrement('stock', $quantity);
    }

    /**
     * Get product by product id.
     *
     * @param int $id
     * @return \Laracon\Inventory\Contracts\DataTransferObjects\ProductDto
     * @throws \Laracon\Inventory\Contracts\Exceptions\ProductNotFoundException
     */
    public function getProductById(int $productId): ProductDto
    {
        $product = Product::find($productId);

        if (!$product) {
            throw new ProductNotFoundException($productId);
        }

        return new ProductDto(
            $product->id,
            $product->name,
            $product->price,
        );
    }
}
