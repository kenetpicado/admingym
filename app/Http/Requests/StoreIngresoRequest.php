<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIngresoRequest extends FormRequest
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
            'concepto' => 'required|max:50',
            'descripcion' => 'nullable|max:50',
            'monto' => 'required|numeric|gt:0',
            'created_at' => 'required|date',
        ];
    }

    public function attributes()
    {
        return [
            'created_at' => 'fecha',
        ];   
    }
}
