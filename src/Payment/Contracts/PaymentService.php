<?php

declare(strict_types=1);

namespace Laracon\Payment\Contracts;

interface PaymentService
{
    /**
     * Make payment for a given amount.
     *
     * @param int  $orderId
     * @param int  $amount
     * @param string  $paymentMethod
     * @return void
     * @throws \Laracon\Payment\Contracts\Exceptions\PaymentException
     * @throws \Laracon\Payment\Contracts\Exceptions\InvalidPaymentMethodException
     */
    public function pay(int $orderId, int $amount, string $paymentMethod): void;
}
