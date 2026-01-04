<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
        $required = $this->isMethod('post') ? 'required' : 'sometimes';

        return [
            'cep' => [$required, 'string' , 'max:8'],
            'street' => [$required, 'string'],
            'number' => [$required, 'max:8'],
            'neighborhood' => [$required, 'string'],
            'city' => [$required, 'string'],
            'state' => [$required, 'string'],
            'complement' => [$required, 'string'],
            'reference' => [$required, 'string'],
        ];
    }
}
