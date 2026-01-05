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
            'cep' => [$required, 'string' , 'min:8','max:9'],
            'street' => [$required, 'string', 'max:100'],
            'number' => [$required, 'min:1','max:8'],
            'neighborhood' => [$required, 'string', 'max:100'],
            'city' => [$required, 'string', 'max:100'],
            'state' => [$required, 'string', 'max:2'],
            'complement' => ['sometimes' ,'string', 'max:200'],
            'reference' => ['sometimes' ,'string', 'max:200'],
            'longitude' => ['sometimes', 'string', 'max:200'], 
            'latitude' => ['sometimes', 'string', 'max:200'], 
        ];
    }

    public function messages()
    {
        return [
            'cep.required' => 'CEP é obrigatório.',
            'cep.string' => 'CEP precisa ser uma string',
            'cep.max' => 'CEP precisa ser no máximo 9 caracteres',
            'cep.min' => 'CEP precisa ser no mínimo 8 caracters',

            'number.required' => 'O número é obrigatório',
            'number.min' => 'O número precisa ser no mínimo 1 caracter',
            'number.max' => 'O número precisa ser no máximo 8 caracteres',

            'complement.string' => 'O complementro precisa ser uma string',
            'complement.max' => 'O complemento precisa ser no máximo 200 caracteres',

            'reference.string' => 'A referência precisa ser uma string',
            'reference.max' => 'A referência precisa ser no máximo 200 caracteres',

            'state.required' => 'A UF é obrigatória', 
            'state.string' => 'A UF precisa ser uma string', 
            'state.max' => 'A UF precisa ser no máximo 2 caracteres', 

            'city.required' => 'Cidade é obrigatório', 
            'city.string' => 'Cidade precisa ser uma string', 
            'city.max' => 'Cidade precisa ser no máximo 100 caracters', 

            'neighborhood.required' => 'Bairro é obrigatório', 
            'neighborhood.string' => 'Bairro precisa ser uma string', 
            'neighborhood.max' => 'Bairro precisa ser no máximo 100 caracters', 

            'street.required' => 'Rua é obrigatória',  
            'street.string' => 'Rua precisa ser uma string', 
            'street.max' => 'Rua precisa ser no máximo 100 caracters',  

            'longitude.string' => 'Longitude precisa ser uma string', 
            'longitude.max' => 'Longitude precisa ser no máximo 200 caracteres', 

            'latitude.string' => 'Latitude precisa ser uma string', 
            'latitude.max' => 'Latitude precisa ser no máximo 200 caracteres', 
            
        ];
    }
}
