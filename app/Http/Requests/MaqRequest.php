<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaqRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'maqu_nome' => 'required',
            'maqu_responsavel'=> 'nullable|integer',
            'maqu_marca'=> 'nullable|string',
            'maqu_modelo'=> 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'string'   => 'O campo :attribute deve ser um texto.',
            'integer'      => 'O campo :attribute tem que ser um número.',
        ];
    }
}
