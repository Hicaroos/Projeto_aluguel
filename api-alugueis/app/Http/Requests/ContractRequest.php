<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'rent_value' => 'required|numeric|between:0,99999.99',
            'payment_day' => 'required',
            'property_id' => 'required|integer|exists:properties,id',
            'tenant_id' => 'required|integer|exists:tenants,id',
        ];
    }
    public function messages(): array
    {
        return [
            'start_date.required' => 'A data de início é obrigatória.',
            'start_date.date' => 'A data de início deve ser uma data válida.',
            'end_date.required' => 'A data de término é obrigatória.',
            'end_date.date' => 'A data de término deve ser uma data válida.',
            'end_date.after_or_equal' => 'A data de término deve ser igual ou posterior à data de início.',
            
            'rent_value.required' => 'O valor do aluguel é obrigatório.',
            'rent_value.numeric' => 'O valor do aluguel deve ser um valor numérico.',
            'rent_value.between' => 'O valor do aluguel deve estar entre 0 e 99999.99.',

            'payment_day.required' => 'O dia do pagamento é obrigatório.',
            'payment_day.integer' => 'O dia do pagamento deve ser um número inteiro.',

            'property_id.required' => 'O imóvel é obrigatório.',
            'property_id.exists' => 'O imóvel selecionado não existe.',
            'tenant_id.required' => 'O inquilino é obrigatório.',
            'tenant_id.exists' => 'O inquilino selecionado não existe.',
        ];
    }
}
