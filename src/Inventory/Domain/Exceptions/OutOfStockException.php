<?php

declare(strict_types=1);

namespace Laracon\Inventory\Domain\Exceptions;

use Exception;

class OutOfStockException extends Exception
{
    public function __construct(public readonly int $productId) {}
}
