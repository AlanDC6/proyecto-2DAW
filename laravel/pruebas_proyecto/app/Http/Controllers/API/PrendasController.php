<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarPrendasRequest;
use App\Http\Requests\GuardarPrendasRequest;
use App\Http\Resources\PrendasResource;
use App\Models\Prendas;
use Illuminate\Http\Request;

class PrendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Prendas::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPrendasRequest $request)
    {
        Prendas::create($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Prenda guardada correctamente'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Prendas $prendas)
    {
        return response()->json([
            'res' => true,
            'prendas' => $prendas
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarPrendasRequest $request, Prendas $prendas)
    {
        $prendas->update($request->all());
        return response()->json([
            'res' => true,
            'mensaje' => 'Prenda Actualizada Correctamente'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prendas $prendas)
    {
        $prendas->delete();
        return response()->json([
            'res' => true,
            'mensaje' => 'Prenda eliinada correctamente'
        ]);
    }
}
