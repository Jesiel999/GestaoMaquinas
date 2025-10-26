<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cola_nome' => 'required|string',
            'cola_cpf' => 'required', 
            'cola_telefone' => 'nullable|string',
            'cola_email' => 'nullable',
            'cola_departamento' => 'required|integer',
            'cola_ativo' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'cola_nome.required' => 'O campo Nome é obrigatório.',
            'cola_nome.string' => 'O nome deve conter apenas texto.',
            
            'cola_cpf.required' => 'O campo CPF é obrigatório.',
            'cola_cpf.integer' => 'O CPF deve conter apenas números.',
            
            'cola_telefone.string' => 'O telefone deve ser um texto válido.',
            
            'cola_email.email' => 'Informe um endereço de e-mail válido.',
            
            'cola_departamento.required' => 'Selecione um departamento.',
            'cola_departamento.integer' => 'O departamento selecionado é inválido.',
        ];
    }
}
