<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCajaRequest extends FormRequest
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
            //
            'beca' => 'nullable|numeric|min:0',
            'nota' => 'nullable|max:30',
            'servicio' => 'required|max:30',
            'created_at' => 'required|date'
        ];
    }

    public function attributes()
    {
        return [
            //
            'created_at' => 'inicia',
            'fecha_fin' => 'expira',
        ];
    }
}
