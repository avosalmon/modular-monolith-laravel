<?php

declare(strict_types=1);

namespace Accredify\Payment\Infrastructure\Services\PaymentStragety;

use Accredify\Payment\Domain\Contracts\PaymentStrategy;

class Paypal implements PaymentStrategy
{
    /**
     * Charge the payment and return transaction id.
     *
     * @param float $amount
     * @return string
     */
    public function charge(float $amount): string
    {
        // Call the payment gateway to charge the payment.

        return 'paypal transaction id';
    }
}
