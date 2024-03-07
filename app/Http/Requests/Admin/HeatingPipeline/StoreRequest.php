<?php

namespace App\Http\Requests\Admin\HeatingPipeline;

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
            'source_id' => 'integer',
            'pipe_start' => 'nullable|string',
            'pipe_end' => 'nullable|string',
            'direct_diam' => 'nullable|integer',
            'reverse_diam' => 'nullable|integer',
            'length' => 'nullable|integer',
            'purpose_type' => 'nullable|integer',
            'laying_type' => 'nullable|integer',
            'ins_type' => 'nullable|integer',
            'ins_cond' => 'nullable|integer',
            'ins_thick' => 'nullable',
            'height' => 'nullable',
            'build_year' => 'nullable|string',
            'note' => 'nullable|string',
            'created_by' => 'nullable|integer',
            'updated_by' => 'nullable|integer',
        ];
    }
}
