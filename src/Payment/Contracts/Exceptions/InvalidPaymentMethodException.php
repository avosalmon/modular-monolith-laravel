<?php

declare(strict_types=1);

namespace Laracon\Payment\Contracts\Exceptions;

use Exception;

class InvalidPaymentMethodException extends Exception
{
    public function __construct(public readonly string $paymentMethod) {}
}
