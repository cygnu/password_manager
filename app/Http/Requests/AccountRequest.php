<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'account_name' => 'required|string|max:255',
            'content_id' => 'required',
            'password' => 'string|max:255',
            'is_multi_factor_authentication' => 'boolean',
            'is_use_oauth2' => 'boolean'
        ];
    }
}
