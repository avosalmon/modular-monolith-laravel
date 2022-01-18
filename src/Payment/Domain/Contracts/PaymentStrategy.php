<?php

declare(strict_types=1);

namespace Laracon\Payment\Domain\Contracts;

interface PaymentStrategy
{
    /**
     * Charge the payment and return transaction id.
     *
     * @param int $amount
     * @return string
     * @throws \Laracon\Payment\Contracts\Exceptions\PaymentException
     */
    public function charge(int $amount): string;
}
