<?php

declare(strict_types=1);

namespace Accredify\Payment\Domain\Contracts;

interface PaymentServiceInterface
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
    public function pay(int $orderId, int $amount, string $paymentMethod): void;
}
