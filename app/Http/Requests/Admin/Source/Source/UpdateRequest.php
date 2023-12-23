<?php

namespace App\Http\Requests\Admin\Source\Source;

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
            'address' => 'required|string|min:1|max:80',
            'connected_power' => 'nullable|string',
            'gps' => 'nullable|string',
            'source_fuel_id' => 'nullable|integer',
            'source_type_id' => 'nullable|integer',
            'city_district_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'in_work' => 'nullable|integer',
            'monitoring' => 'nullable|integer',
            'balance' => 'nullable|integer',
        ];
    }
}
