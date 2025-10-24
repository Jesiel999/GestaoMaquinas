<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "depa_nome"=> "required",
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é obrigatório.'
        ];
    }
}
