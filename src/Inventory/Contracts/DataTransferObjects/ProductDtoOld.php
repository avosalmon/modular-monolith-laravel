<?php

declare(strict_types=1);

namespace Laracon\Inventory\Contracts\DataTransferObjects;

/**
 * Product DTO implementation in older version of PHP.
 */
class ProductDtoOld
{
    private int $id;

    private string $name;

    private int $price;

    public function __construct(
        int $id,
        string $name,
        int $price,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}
