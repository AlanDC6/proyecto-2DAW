<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarDetalles_pedidoRequest;
use App\Http\Requests\GuardarDetalles_pedidoRequest;
use App\Http\Resources\Detalles_pedidoResource;
use App\Models\Detalles_pedido;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class Detalles_pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Detalles_pedidoResource::collection(Detalles_pedido::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarDetalles_pedidoRequest $request)
    {
        return new Detalles_pedidoResource(Detalles_pedido::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new Detalles_pedidoResource(Detalles_pedido::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarDetalles_pedidoRequest $request, $id)
    {
        Detalles_pedido::find($id)->update($request->all());
        return (new Detalles_pedidoResource(Detalles_pedido::find($id)))
        ->additional(['msg' => 'Detalles actualizado corractamente'])
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
        Detalles_pedido::find($id)->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Detalles eliminado correctamente'
        ]);
    }
}
