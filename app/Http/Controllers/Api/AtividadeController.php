<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\AtividadeRespository;
use App\Http\Requests\StoreAtividade;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class AtividadeController extends Controller
{
    private $atividade;
    private $user;

    public function __construct(AtividadeRespository $atividade, UserRepository $user)
    {
        $this->atividade = $atividade;
        $this->user = $user;
    }

    /**
     * List
     */
    public function index(Request $request)
    {
        $user = $this->atividade->findByToken($request->api_token);    
        $atividades = $user->atividades();
        return response()->json(['data' => $atividades], 200);
    }

    /**
     * Store
     */
    public function store(StoreAtividade $request)
    {
        $atividade = $this->atividade->store($request);
        return response()->json(['data' => $atividade], 201);
    }

    /**
     * Show
     */
    public function show($id, Request $request)
    {
        $user = $this->user->findByToken($request->api_token);
        $atividade = $this->atividade->find($id);
        if(!$atividade) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }
        if($user != $atividade->user) {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return response()->json(['data' => $atividade], 200);
    }

    /**
     * Update 
     */  
    public function update(StoreAtividade $request, $id)
    {
        $user = $this->user->findByToken($request->apiToken);
        $atividade = $this->atividade->find($id);
        if(!$atividade) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }
        if($user != $atividade->user) {
            return response()->json([
                'message' => 'Server Error',
            ], 500);
        }
        $atividade = $atividade->update($id, $request);        
        return response()->json(['data' => $atividade], 200);
    }

    /**
     * Destroy
     */
    public function destroy($apiToken, $id)
    {
        $user = $this->user->findByToken($apiToken);
        $atividade = $this->atividade->destroy($id);
        if(!$atividade) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }
        if($user != $atividade->user) {
            return response()->json([
                'message' => 'Server Error',
            ], 500);
        }
        return response()->json(['data' => $atividade], 200);
    }
}
