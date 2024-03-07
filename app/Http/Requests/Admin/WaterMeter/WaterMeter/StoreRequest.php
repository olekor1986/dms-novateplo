<?php

namespace App\Http\Requests\Admin\WaterMeter\WaterMeter;

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
            'title' => 'required|string|min:3|max:50',
            'diameter' => 'required|integer',
            'serial_number' => 'string|min:3|max:100',
            'purpose' => 'integer',
            'check_date' => 'string',
            'made_year' => 'string',
            'condition' => 'integer',
            'note' => 'string|max:100',
            'source_id' => 'required|integer',
        ];
    }
}
