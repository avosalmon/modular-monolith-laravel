<?php

declare(strict_types=1);

namespace Laracon\Payment\Contracts\Exceptions;

use Exception;

class PaymentException extends Exception
{
    public function __construct(
        public readonly string $paymentMethod,
        public readonly int $amount
    ) {}
}
