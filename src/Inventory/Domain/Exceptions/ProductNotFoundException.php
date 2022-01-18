<?php

declare(strict_types=1);

namespace Laracon\Inventory\Domain\Exceptions;

use Exception;

class ProductNotFoundException extends Exception
{
    public function __construct(private int $productId) {}
}
