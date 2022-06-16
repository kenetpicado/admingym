<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEgresoRequest extends FormRequest
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
            'tipo' => 'required|max:50',
            'nota' => 'required|max:20',
            'monto' => 'required|numeric|gt:0',
            'created_at' => 'required|date',
            
        ];
    }

    public function attributes()
    {
        return [
            'tipo' => 'concepto',
            'nota' => 'descripcion',
            'created_at' => 'fecha',
        ];
    }
}
