<?php

declare(strict_types=1);

namespace Laracon\Inventory\Infrastructure\Services;

use Laracon\Inventory\Contracts\DataTransferObjects\Product as ProductDto;
use Laracon\Inventory\Contracts\Exceptions\{InactiveProductException, OutOfStockException, ProductNotFoundException};
use Laracon\Inventory\Contracts\ProductService as ProductServiceContract;
use Laracon\Inventory\Domain\Models\Product;

class ProductService implements ProductServiceContract
{
    /**
     * Get product by product id.
     *
     * @param int $id
     * @return \Laracon\Inventory\Contracts\DataTransferObjects\Product
     * @throws \Laracon\Inventory\Contracts\ExceptionsProductNotFoundException
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
