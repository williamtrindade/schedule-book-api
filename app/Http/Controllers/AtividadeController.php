<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AtividadeRespository;
use App\Http\Requests\StoreAtividade;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AtividadeRespository $atividade)
    {
        return response()->json(['data' => $atividade->all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAtividade $request, AtividadeRespository $atividade)
    {
        $atividade = $atividade->store($request);
        return response()->json(['data' => $atividade], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AtividadeRespository $atividade, $id)
    {
        $atividade = $atividade->find($id);
        if(!$atividade) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }
        return response()->json(['data' => $atividade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AtividadeRespository $atividade, $id)
    {
        $atividade = $atividade->find($id);

        if(!$atividade) {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return response()->json(['data' => $atividade]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAtividade $request, AtividadeRespository $atividade, $id)
    {
        $atividade = $atividade->update($id, $request);        
        return response()->json(['data' => $atividade]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AtividadeRespository $atividade, $id)
    {
        $atividade = $atividade->destroy($id);
        return response()->json(['data' => $atividade]);
    }
}
