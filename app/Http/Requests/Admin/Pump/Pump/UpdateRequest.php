<?php

namespace App\Http\Requests\Admin\Pump\Pump;

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
            'title' => 'string',
            'max_capacity' => 'nullable|string',
            'max_pressure' => 'nullable|string',
            'engine_power' => 'nullable|string',
            'engine_speed' => 'nullable|string',
            'engine_title' => 'nullable|string',
            'serial_number' => 'nullable|string',
            'index_number' => 'nullable|string',
            'images' => 'nullable|json',
            'shaft_diam' => 'nullable|integer',
            'front_bearing_id' => 'nullable|integer',
            'rear_bearing_id' => 'nullable|integer',
            'mechanical_seal_id' => 'nullable|integer',
            'in_work' => 'boolean',
            'pump_type_id' => 'integer',
            'source_id' => 'integer',
        ];
    }
}
