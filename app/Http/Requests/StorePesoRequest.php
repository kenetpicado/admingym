<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePesoRequest extends FormRequest
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
            'peso' => 'required|numeric|gt:0',
            'cliente_id' => ['integer', Rule::requiredIf($this->isMethod('POST'))],
            'created_at' => 'required|date'
        ];
    }
}
