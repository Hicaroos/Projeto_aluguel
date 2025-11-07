<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|between:0,99999.99',
            'address_street' => 'required|string|max:255',
            'address_number' => 'required|string|max:10',
            'address_city' => 'required|string|max:255',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'garage_spaces' => 'required|integer|min:0',
            'status' => ['required', 'string', Rule::in(['available', 'rented', 'unavailable'])]
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'title.max' => 'O título não pode ter mais de 255 caracteres.',
            'description.string' => 'A descrição deve ser um texto.',
            
            'price.required' => 'O preço é obrigatório.',
            'price.numeric' => 'O preço deve ser um valor numérico.',
            'price.between' => 'O preço deve estar entre 0 e 99999.99.',
            
            'address_street.required' => 'A rua do endereço é obrigatória.',
            'address_street.string' => 'A rua deve ser um texto.',
            'address_street.max' => 'A rua não pode ter mais de 255 caracteres.',
            
            'address_number.required' => 'O número do endereço é obrigatório.',
            'address_number.string' => 'O número deve ser uma string.',
            'address_number.max' => 'A número não pode ter mais de 10 caracteres.',
            
            'address_city.required' => 'A cidade do endereço é obrigatória.',
            'address_city.string' => 'A cidade deve conter um texto.',
            'address_city.max' => 'A cidade não pode ter mais de 255 caracteres.',
            
            'bedrooms.required' => 'O número de quartos é obrigatório.',
            'bedrooms.integer' => 'O número de quartos deve ser um inteiro.',
            'bathrooms.required' => 'O número de banheiros é obrigatório.',
            'bathrooms.integer' => 'O número de banheiros deve ser um inteiro.',
            'garage_spaces.required' => 'O número de vagas de garagem é obrigatório.',
            'garage_spaces.integer' => 'O número de vagas de garagem deve ser um inteiro.',

            'status.required' => 'O status é obrigatório.',
            'status.in' => 'O status selecionado é inválido (aceitos: Disponível, Alugado, Indisponível).',
        ];
    }
}
