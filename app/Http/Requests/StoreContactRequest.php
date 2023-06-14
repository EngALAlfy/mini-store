<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            "name" => "required|min:2|max:200",
            "email" => "required|email|min:2|max:200",
            "phone" => "required|min:2|max:200",
            "title" => "required|min:2|max:200",
            "message" => "required|min:2|max:500",
        ];
    }
}
