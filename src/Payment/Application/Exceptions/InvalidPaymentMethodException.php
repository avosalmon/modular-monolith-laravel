<?php

declare(strict_types=1);

namespace Accredify\Payment\Application\Exceptions;

use Exception;

class InvalidPaymentMethodException extends Exception
{
    public function __construct(private string $paymentMethod)
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
            'message' => 'Invalid payment method.',
            'payment_method' => $this->paymentMethod,
        ], 400);
    }
}
