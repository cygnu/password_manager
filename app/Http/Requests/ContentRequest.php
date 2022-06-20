<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
            'content_name' => 'required|string|max:255',
            'content_image' => 'string|max:255',
            'content_url' => 'required|url|max:255',
            'is_one_account' => 'boolean',
            'is_paid_subscription' => 'boolean'
        ];
    }
}
