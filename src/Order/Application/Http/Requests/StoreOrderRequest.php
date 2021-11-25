<?php

namespace Accredify\Order\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => ['required', 'integer'],
            'quantity' => ['required', 'integer'],
            'payment_method' => ['required', Rule::in(['credit-card', 'paypal', 'bank-transfer'])],
        ];
    }
}
