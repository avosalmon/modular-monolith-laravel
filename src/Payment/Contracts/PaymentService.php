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
     * @return void
     * @throws \Laracon\Payment\Contracts\Exceptions\PaymentException
     */
    public function charge(int $orderId, int $amount): void;
}
