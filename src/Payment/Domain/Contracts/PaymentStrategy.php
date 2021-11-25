<?php

declare(strict_types=1);

namespace Accredify\Payment\Domain\Contracts;

interface PaymentStrategy
{
    /**
     * Charge the payment and return transaction id.
     *
     * @param float $amount
     * @return string
     * @throws \Accredify\Payment\Application\Exceptions\PaymentException
     */
    public function charge(float $amount): string;
}
