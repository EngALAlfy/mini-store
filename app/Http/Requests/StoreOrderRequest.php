<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'product_id' => 'required|exists:products,id',
            'client_name' => 'required|string',
            'client_phone' => 'required',
            'client_email' => 'required|email',
            'client_address' => 'nullable|string',
            'message' => 'nullable|string|max:500',
        ];
    }
}
