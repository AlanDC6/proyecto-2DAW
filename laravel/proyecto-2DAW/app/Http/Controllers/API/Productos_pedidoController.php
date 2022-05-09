<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarProductos_pedidoRequest;
use App\Http\Requests\GuardarProductos_pedidoRequest;
use App\Http\Resources\Productos_pedidoResource;
use App\Models\Productos_pedido;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class Productos_pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Productos_pedidoResource::collection(Productos_pedido::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarProductos_pedidoRequest $request)
    {
        return new Productos_pedidoResource(Productos_pedido::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new Productos_pedidoResource(Productos_pedido::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarProductos_pedidoRequest $request, $id)
    {
        Productos_pedido::find($id)->update($request->all());
        return (new Productos_pedidoResource(Productos_pedido::find($id)))
        ->additional(['msg' => 'Zapato actualizado corractamente'])
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
        Productos_pedido::find($id)->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Zapato eliminado correctamente'
        ]);
    }
}
