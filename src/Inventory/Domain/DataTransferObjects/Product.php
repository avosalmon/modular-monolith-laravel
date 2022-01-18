<?php

declare(strict_types=1);

namespace Laracon\Inventory\Domain\DataTransferObjects;

class Product
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly int $price,
    ) {}
}
