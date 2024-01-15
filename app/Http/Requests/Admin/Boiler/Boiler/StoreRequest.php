<?php

namespace App\Http\Requests\Admin\Boiler\Boiler;

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
            'title' => 'string',
            'energy_carrier' => 'integer',
            'power' => 'nullable',
            'efficient' => 'nullable',
            'mount_year' => 'integer',
            'launch_year' => 'integer',
            'index_number' => 'string',
            'serial_number' => 'string',
            'reg_number' => 'string',
            'check_date' => 'date',
            'in_work' => 'boolean',
            'source_id' => 'integer',
            'boiler_fuel_id' => 'integer',
        ];
    }
}
