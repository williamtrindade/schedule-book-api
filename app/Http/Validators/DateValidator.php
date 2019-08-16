<?php
namespace App\Http\Validators;

use Carbon\Carbon;
use App\Atividade;

class DateValidator
{
    private $model;
    private $inicio;
    private $fim;
    private $conclusao;

    public function __construct($inicio, $fim, $conclusao)
    {
        $this->model     = new Atividade();
        $this->inicio    = $inicio;
        $this->fim       = $fim;
        $this->conclusao = $conclusao;
    }

    public function validateWeekend() : bool
    {
        $inicio = new Carbon($this->inicio);
        $fim = new Carbon($this->fim);
        if($inicio <= $fim) {
            while($inicio <= $fim) {
                if($inicio->format('D') == 'Sat' || $inicio->format('D') == 'Sun') {
                    return false;
                } else if($fim->format('D') == 'Sat' || $fim->format('D') == 'Sun') {
                    return false;
                }
                $inicio->addDay();
            }
        } else {
            return false;
        }   
        return true;    
    }

    public function dateOverlay() : bool
    {
        // Se algo terminar ou começar nesse range da data que usuário quer cadastrar
        if($this->model->whereBetween('inicio', [$this->inicio, $this->fim])->get()->count() || $this->model->whereBetween('fim', [$this->inicio, $this->fim])->get()->count()) {
            return false;
        }
        return true;
    }
}