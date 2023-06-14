<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|max:200|min:2',
            'email' => 'required|max:200|min:4|unique:users,email|regex:/^[a-z][a-z0-9_]*$/i',
            // 'roles' => 'required|min:1',
        ];
    }
}
