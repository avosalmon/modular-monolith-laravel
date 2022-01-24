<?php

declare(strict_types=1);

namespace Laracon\Inventory\Contracts\DataTransferObjects;

class ProductDto
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly int $price,
    ) {}
}
