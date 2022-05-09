<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarComplementosRequest;
use App\Http\Requests\GuardarComplementosRequest;
use App\Http\Resources\ComplementosResource;
use App\Models\Complementos;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ComplementosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ComplementosResource::collection(Complementos::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarComplementosRequest $request)
    {
        return new ComplementosResource(Complementos::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ComplementosResource(Complementos::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarComplementosRequest $request, $id)
    {
        Complementos::find($id)->update($request->all());
        return (new ComplementosResource(Complementos::find($id)))
        ->additional(['msg' => 'Complemento actualizado corractamente'])
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
        Complementos::find($id)->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Complemento eliminado correctamente'
        ]);
    }
}
