<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Validators\DateValidator;

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
            'inicio' => 'required|date',
            'fim' => 'required|date',
            'status' => 'required',
            'titulo' => 'required',
            'descricao' => 'required',
            'user_id' => 'required',
        ];
    }

    public function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
        $validator->after(function() use ($validator)
        {
            $dateValidator = new DateValidator($this->inicio, $this->fim, $this->conclusao);
            if(!$dateValidator->validateWeekend()) {
                $validator->errors()->add('inicio', 'Datas inválidas ou em finais de semana');
                $validator->errors()->add('fim', 'Datas inválidas ou em finais de semana');
            }
            if(!$dateValidator->dateOverlay()) {
                $validator->errors()->add('inicio', 'A atividade nao pode sobrepor outras atividades');
                $validator->errors()->add('fim', 'A atividade nao pode sobrepor outras atividades');
            }
        });
        return $validator;
    } 
}