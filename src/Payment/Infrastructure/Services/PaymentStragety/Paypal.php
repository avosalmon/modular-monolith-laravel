<?php

declare(strict_types=1);

namespace Laracon\Payment\Infrastructure\Services\PaymentStragety;

use Laracon\Payment\Domain\Contracts\PaymentStrategy;

class Paypal implements PaymentStrategy
{
    /**
     * Charge the payment and return transaction id.
     *
     * @param int $amount
     * @return string
     */
    public function charge(int $amount): string
    {
        // Call the payment gateway to charge the payment.

        return 'paypal transaction id';
    }
}
