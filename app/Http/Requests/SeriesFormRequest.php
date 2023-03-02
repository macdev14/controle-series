<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'nome' => 'required|min:3',
            'qtd_temporadas' => 'required|min:1',
            'ep_por_temporada' => 'required|min:1'
            
    
        ];
    }

    public function messages ()
{
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.min' => 'O campo nome precisa ter pelo menos três caracteres',
            'qtd_temporadas.required' => 'O campo quantidade de temporadas é obrigatório',
            'qtd_temporadas.min' => 'O campo quantidade de temporadas precisa ter pelo menos uma temporada',
            'ep_por_temporada.required' => 'O campo episódios por temporada é obrigatório',
            'ep_por_temporada.min' => 'O campo episódios por temporada precisa ter pelo menos um episódio',
        ];
}
}
