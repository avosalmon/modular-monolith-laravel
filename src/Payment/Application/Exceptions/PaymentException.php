<?php

declare(strict_types=1);

namespace Laracon\Payment\Application\Exceptions;

use Exception;

class PaymentException extends Exception
{
    public function __construct(private string $paymentMethod, private int $amount)
    {
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json([
            'message' => 'Payment failed.',
            'payment_method' => $this->paymentMethod,
            'amount' => $this->amount,
        ], 400);
    }
}
