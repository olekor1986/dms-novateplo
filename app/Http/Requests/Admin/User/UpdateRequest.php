<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|string',
            'first_name' => 'string',
            'last_name' => 'string',
            'avatar' => 'file',
            'staff_id' => 'integer',
            'w_phone' => 'string',
            'm_phone' => 'string',
            'role_id' => 'integer',
            'banned' => 'boolean',
        ];
    }
}
