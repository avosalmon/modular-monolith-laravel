<?php

declare(strict_types=1);

namespace Accredify\Payment\Domain\Services;

use Accredify\Payment\Application\Exceptions\InvalidPaymentMethodException;
use Accredify\Payment\Domain\Contracts\PaymentServiceInterface;
use Accredify\Payment\Domain\Contracts\PaymentStrategy;
use Accredify\Payment\Infrastructure\Services\PaymentStragety\CreditCard;
use Accredify\Payment\Infrastructure\Services\PaymentStragety\Paypal;

class PaymentService implements PaymentServiceInterface
{
    /**
     * Make payment for a given amount.
     *
     * @param int  $orderId
     * @param int  $amount
     * @param string  $paymentMethod
     * @return void
     * @throws \Accredify\Payment\Application\Exceptions\PaymentException
     * @throws \Accredify\Payment\Application\Exceptions\InvalidPaymentMethodException
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
     * @return \Accredify\Payment\Domain\Contracts\PaymentStrategy
     * @throws \Accredify\Payment\Application\Exceptions\InvalidPaymentMethodException
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
