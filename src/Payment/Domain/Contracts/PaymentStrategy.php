<?php

declare(strict_types=1);

namespace Laracon\Payment\Domain\Contracts;

interface PaymentStrategy
{
    /**
     * Charge the payment and return transaction id.
     *
     * @param float $amount
     * @return string
     * @throws \Laracon\Payment\Application\Exceptions\PaymentException
     */
    public function charge(float $amount): string;
}
