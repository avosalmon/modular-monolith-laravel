<?php

declare(strict_types=1);

namespace Laracon\Payment\Infrastructure\Services\PaymentStrategy;

use Illuminate\Support\Str;
use Laracon\Payment\Domain\Contracts\PaymentStrategy;

class BankTransfer implements PaymentStrategy
{
    /**
     * Process the payment and return transaction id.
     *
     * @param int $amount
     * @return string
     * @throws \Laracon\Payment\Contracts\Exceptions\PaymentException
     */
    public function charge(int $amount): string
    {
        // Call the payment gateway to process the payment.

        return 'bank-transfer:' . Str::random(16);
    }
}
