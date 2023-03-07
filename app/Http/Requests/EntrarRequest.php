<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrarRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|min:3',
            'password' => 'required|min:6'
            
    
        ];
    }

    public function messages ()
    {
            return [
                'email.required' => 'O campo Email é obrigatório',
                'email.min' => 'O campo Email precisa ter pelo menos três caracteres',
                'password.required' => 'O campo Senha é obrigatório',
                'password.min' => 'O campo Senha precisa ter pelo menos seis caracteres',
                
            ];
    }

}
