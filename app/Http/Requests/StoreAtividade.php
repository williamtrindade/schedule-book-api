<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAtividade extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'data_de_inicio' => 'required|date',
            'data_de_prazo' => 'required|date',
            'data_de_conclusao' => 'required|date',
            'status' => 'required',
            'tituto' => 'required',
            'descricao' => 'required',
        ];
    }
}
