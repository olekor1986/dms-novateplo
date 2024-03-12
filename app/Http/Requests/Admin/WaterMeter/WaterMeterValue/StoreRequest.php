<?php

namespace App\Http\Requests\Admin\WaterMeter\WaterMeterValue;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'date' => 'required',
            'value' => 'required|string',
            'after_check' => 'integer',
            'note' => 'string|nullable',
            'water_meter_id' => 'required|integer',
        ];
    }
}
