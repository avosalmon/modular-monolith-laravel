<?php

declare(strict_types=1);

namespace Laracon\Payment\Infrastructure\Services\PaymentStrategy;

use Laracon\Payment\Domain\Contracts\PaymentStrategy;

class CreditCard implements PaymentStrategy
{
    /**
     * Charge the payment and return transaction id.
     *
     * @param int $amount
     * @return string
     * @throws \Laracon\Payment\Contracts\Exceptions\PaymentException
     */
    public function charge(int $amount): string
    {
        // Call the payment gateway to charge the payment.

        return 'credit card transaction id';
    }
}
