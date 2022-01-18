<?php

declare(strict_types=1);

namespace Laracon\Inventory\Domain\Services\Query;

use Laracon\Inventory\Domain\Contracts\Query\ProductQuery as ProductQueryContract;
use Laracon\Inventory\Domain\DataTransferObjects\Product as ProductDto;
use Laracon\Inventory\Domain\Exceptions\ProductNotFoundException;
use Laracon\Inventory\Domain\Models\Product;

class ProductQuery implements ProductQueryContract
{
    /**
     * Get product by product id.
     *
     * @param int $id
     * @return ProductDto|null
     * @throws ProductNotFoundException
     */
    public function getProductById(int $productId): ?ProductDto
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
