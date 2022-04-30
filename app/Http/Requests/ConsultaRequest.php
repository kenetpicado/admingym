<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaRequest extends FormRequest
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
            'inicio' => 'required|date',
            'fin' => 'required|date|after_or_equal:inicio'
        ];
    }

    public function attributes()
    {
        return [
            //
            'fin' => 'fecha fin',
            'inicio' => 'fecha inicio',
        ];
    }
}
