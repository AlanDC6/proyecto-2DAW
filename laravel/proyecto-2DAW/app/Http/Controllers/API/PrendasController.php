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
        return PrendasResource::collection(Prendas::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPrendasRequest $request)
    {
        return (new PrendasResource(Prendas::create($request->all())))
        ->additional(['msg' => 'Prenda guardado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Prendas $prendas)
    {
        return new PrendasResource($prendas);
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
        return (new PrendasResource($prendas))
        ->additional(['msg' => 'Prenda actualizada corractamente'])
        ->response()
        ->setStatusCode(202);
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
        return (new PrendasResource($prendas))
        ->additional(['msg' => 'Prenda eliminada corractamente']);
    }
}
