<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\AtividadeRepository;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

/**
 * Class FilterController
 * @package App\Http\Controllers\Api
 */
class FilterController extends Controller
{
    /**
     * @var AtividadeRepository
     */
    private $atividade;

    /**
     * @var UserRepository
     */
    private $user;

    /**
     * FilterController constructor.
     * @param AtividadeRepository $atividade
     * @param UserRepository $user
     */
    public function __construct(AtividadeRepository $atividade, UserRepository $user)
    {
        $this->atividade = $atividade;
        $this->user = $user;
    }

    /**
     * Filter between a date range
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function filter(Request $request)
    {
        $user = $this->user->findByToken($request->api_token)->first();
        $atividades = $this->atividade->filter($user->id, $request->inicio, $request->fim);
        return response()->json(['data' => $atividades], 200);
    }
}
