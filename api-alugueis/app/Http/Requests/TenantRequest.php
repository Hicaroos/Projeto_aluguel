<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class TenantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $tenant = Route::current()->parameter('tenant');

        $uniqueRule = function (string $column) use ($tenant) {
            return Rule::unique('tenants', $column)
                ->ignore($tenant ? $tenant->id : null)
                ->whereNull('deleted_at'); //
        };

        return [
            'name' => 'required|string|max:255',
            'email' => [
                'nullable',
                'string',
                'email',
                'max:255',
                $uniqueRule('email'),
            ],
            'phone' => [
                'required',
                'string',
                'max:255',
                $uniqueRule('phone'),
            ],
            'cpf' => [
                'required',
                'string',
                'max:11',
                $uniqueRule('cpf'),
            ]
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser um texto.',
            'name.max' => 'O nome não pode ter mais de 255 caracteres.',

            'email.email' => 'O email deve ser um endereço de email válido.',
            'email.max' => 'O email não pode ter mais de 255 caracteres.',
            'email.unique' => 'Este email já está em uso por outro inquilino.',

            'phone.required' => 'O telefone é obrigatório.',
            'phone.string' => 'O telefone deve ser um texto.',
            'phone.max' => 'O telefone não pode ter mais de 255 caracteres.',
            'phone.unique' => 'Este telefone já está em uso por outro inquilino.',

            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.string' => 'O CPF deve ser um texto.',
            'cpf.max' => 'O CPF deve ter no máximo 11 caracteres (apenas números).',
            'cpf.unique' => 'Este CPF já está em uso por outro inquilino.',
        ];
    }
}
