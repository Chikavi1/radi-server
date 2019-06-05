<?php

namespace Radi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDogRequest extends FormRequest
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
            'nombre' => 'required|string|max:25',
            'especie' => 'required|string|max:20',
            'raza' => 'required|string|max:20',
            'color' => 'required|string|max:20',
            'imagen' => 'mimes:jpeg,jpg,png',
            'sexo' => 'required|string|max:20',
            'senas' => 'required|string|max:350',
            'notas' => 'required|string|max:350',
            'status' => 'required|string|max:20',
        ];
    }
}
