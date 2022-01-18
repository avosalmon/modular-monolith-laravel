<?php

declare(strict_types=1);

namespace Laracon\Inventory\Domain\Contracts\Query;

use Laracon\Inventory\Domain\DataTransferObjects\Product as ProductDto;

interface ProductQuery
{
    /**
     * Get product by product id.
     *
     * @param int $id
     * @return ProductDto|null
     * @throws ProductNotFoundException
     */
    public function getProductById(int $productId): ?ProductDto;
}
