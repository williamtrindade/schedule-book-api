<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repositories\AtividadeRepository;
use App\Http\Requests\StoreAtividade;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

/**
 * Class AtividadeController
 * @package App\Http\Controllers\Api
 */
class AtividadeController extends Controller
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
     * Make the dependency injection
     *
     * AtividadeController constructor.
     * @param AtividadeRepository $atividade
     * @param UserRepository $user
     */
    public function __construct(AtividadeRepository $atividade, UserRepository $user)
    {
        $this->atividade = $atividade;
        $this->user = $user;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $user = $this->user->findByToken($request->api_token)->first();
        $atividades = $user->atividades;
        return response()->json(['data' => $atividades], 200);
    }

    /**
     * @param StoreAtividade $request
     * @return JsonResponse
     */
    public function store(StoreAtividade $request) {
        $data = $request->validated();
        $atividade = $this->atividade->store($data);
        if(!$atividade) {
            return response()->json(['Server Error'], 500);
        }
        return response()->json(['data' => $data], 201);
    }

    /**
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function show($id, Request $request)
    {
        $user = $this->user->findByToken($request->api_token)->first();
        $atividade = $this->atividade->find($id);
        if(!$atividade) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }
        if($user->id != $atividade->user->id) {
            return response()->json([
                'message' => 'Access denied',
            ], 401);
        }
        return response()->json(['data' => $atividade], 200);
    }

    /**
     * @param $id
     * @param StoreAtividade $request
     * @return JsonResponse
     */
    public function update($id, StoreAtividade $request)
    {
        $data = $request->validated();
        $user = $this->user->findByToken($request->api_token)->first();
        $atividade = $this->atividade->find($id);

        if(!$atividade) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }
        if($user->id != $atividade->user->id) {
            return response()->json([
                'message' => 'Access denied',
            ], 401);
        }
        $atividade = $atividade->update($id, $data);
        return response()->json(['data' => $atividade], 200);
    }

    /**
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy($id, Request $request)
    {
        $user = $this->user->findByToken($request->api_token)->first();
        $atividade = $this->atividade->find($id);
        if(!$atividade) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }
        if($user->id != $atividade->user->id) {
            return response()->json([
                'message' => 'Access denied',
            ], 401);
        }
        $atividade = $atividade->destroy($id);
        return response()->json(['data' => $atividade], 200);
    }

}
