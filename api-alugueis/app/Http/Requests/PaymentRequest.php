<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentRequest extends FormRequest
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
            'contract_id' => 'required|integer|exists:contracts,id', 
            'amount' => 'required|numeric|between:0,99999.99',
            'paid_date' => 'required|date',
            'due_date' => 'required|date',
            'status' => ['required', 'string', Rule::in(['pendent', 'paid', 'overdue'])],
        ];
    }
    public function messages(): array
    {
        return [
            'contract_id.required' => 'O contrato (contract_id) é obrigatório.',
            'contract_id.exists' => 'O contrato selecionado não existe.',

            'amount.required' => 'O valor é obrigatório.',
            'amount.numeric' => 'O valor deve ser numérico.',
            'amount.between' => 'O valor deve estar entre 0 e 99999.99.',

            'paid_date.required' => 'A data de pagamento é obrigatória.',
            'paid_date.date' => 'A data de pagamento deve ser uma data válida.',
            
            'due_date.required' => 'A data de vencimento é obrigatória.',
            'due_date.date' => 'A data de vencimento deve ser uma data válida.',

            'status.required' => 'O status é obrigatório.',
            'status.in' => 'O status selecionado é inválido (aceitos: Pendente, Pago, Atrasado).',
        ];
    }
}
