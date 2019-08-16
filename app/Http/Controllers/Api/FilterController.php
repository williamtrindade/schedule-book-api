<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\AtividadeRespository;
use App\Http\Requests\StoreAtividade;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class FilterController extends Controller
{
    private $atividade;
    private $user;

    public function __construct(AtividadeRespository $atividade, UserRepository $user)
    {
        $this->atividade = $atividade;
        $this->user = $user;
    }

    public function filter(Request $request)
    {
        $user = $this->user->findByToken($request->api_token)->first();    
        $atividades = $this->atividade->filter($user->id, $request->inicio, $request->fim);
        return response()->json(['data' => $atividades], 200);
    }
}