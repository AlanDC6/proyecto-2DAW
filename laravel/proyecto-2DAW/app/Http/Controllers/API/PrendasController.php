<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarPrendasRequest;
use App\Http\Requests\GuardarPrendasRequest;
use App\Http\Resources\PrendasResource;
use App\Models\Prendas;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

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
        return new PrendasResource(Prendas::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PrendasResource(Prendas::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarPrendasRequest $request, $id)
    {
        Prendas::find($id)->update($request->all());
        return (new PrendasResource(Prendas::find($id)))
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
    public function destroy($id)
    {
        Prendas::find($id)->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Prenda eliminada correctamente'
        ]);
    }
}
