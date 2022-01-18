<?php

declare(strict_types=1);

namespace Laracon\Payment\Domain\Services;

use Laracon\Payment\Application\Exceptions\InvalidPaymentMethodException;
use Laracon\Payment\Domain\Contracts\{PaymentServiceInterface, PaymentStrategy};
use Laracon\Payment\Infrastructure\Services\PaymentStragety\{CreditCard, Paypal};

class PaymentService implements PaymentServiceInterface
{
    /**
     * Make payment for a given amount.
     *
     * @param int  $orderId
     * @param int  $amount
     * @param string  $paymentMethod
     * @return void
     * @throws \Laracon\Payment\Application\Exceptions\PaymentException
     * @throws \Laracon\Payment\Application\Exceptions\InvalidPaymentMethodException
     */
    public function pay(int $orderId, int $amount, string $paymentMethod): void
    {
        $transactionId = $this->strategy($paymentMethod)->charge($amount);

        // TODO: save payment transaction in database
    }

    /**
     * Get the payment strategy.
     *
     * @param string  $paymentMethod
     * @return \Laracon\Payment\Domain\Contracts\PaymentStrategy
     * @throws \Laracon\Payment\Application\Exceptions\InvalidPaymentMethodException
     */
    private function strategy(string $paymentMethod): PaymentStrategy
    {
        // TODO: define payment methods as enum
        $strategy = match ($paymentMethod) {
            'credit-card' => new CreditCard,
            'paypal' => new Paypal,
            default => throw new InvalidPaymentMethodException($paymentMethod)
        };

        return $strategy;
    }
}
