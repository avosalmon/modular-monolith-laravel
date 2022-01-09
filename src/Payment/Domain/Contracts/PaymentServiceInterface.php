<?php

declare(strict_types=1);

namespace Laracon\Payment\Domain\Contracts;

interface PaymentServiceInterface
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
    public function pay(int $orderId, int $amount, string $paymentMethod): void;
}
