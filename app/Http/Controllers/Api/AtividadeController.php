<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\AtividadeRespository;
use App\Http\Requests\StoreAtividade;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class AtividadeController extends Controller
{

    /**
     * List
     */
    public function index(AtividadeRespository $atividade)
    {
        return response()->json(['data' => $atividade->all()], 200);
    }

    /**
     * Store
     */
    public function store(StoreAtividade $request, AtividadeRespository $atividade)
    {
        $atividade = $atividade->store($request);
        return response()->json(['data' => $atividade], 201);
    }

    /**
     * Show
     */
    public function show(AtividadeRespository $atividade, UserRepository $user, $id, Request $request)
    {
        $user = $user->findByToken($request->api_token);
        $atividade = $atividade->find($id);
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
    public function update(StoreAtividade $request, AtividadeRespository $atividade, $id)
    {
        $user = $user->findByToken($request->apiToken);
        $atividade = $atividade->find($id);
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
    public function destroy(AtividadeRespository $atividade, $apiToken, $id)
    {
        $user = $user->findByToken($apiToken);
        $atividade = $atividade->destroy($id);
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
