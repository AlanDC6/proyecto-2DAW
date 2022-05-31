<?php

namespace App\Http\Controllers;

use App\Models\detallesPedido;
use App\Models\User;
use Illuminate\Http\Request;

class detalles_pedidoController extends Controller
{
    public function mostrarDetallesPago($precioTotal)
    {
        return view('detalles_pedidos')->with('precioTotal', $precioTotal);
    }

    public function guardarDetallesPedido(Request $request, $precioTotal)
    {
        $id = auth()->user()->id;
        $usuario = User::find($id);

        if ($usuario->saldo <= $precioTotal) {
            return view('error_saldo');
        }

        $usuario->saldo = $usuario->saldo - $precioTotal;

        $usuario->save();

        $detalles_pedido = new detallesPedido();

        $id_user = auth()->user()->id;
        $detalles_pedido->id_user = $id_user;

        $detalles_pedido->precio_total = $precioTotal;

        $pais = $request->input('pais');
        $detalles_pedido->pais = $pais;

        $ciudad = $request->input('ciudad');
        $detalles_pedido->ciudad = $ciudad;

        $direccion = $request->input('direccion');
        $detalles_pedido->direccion = $direccion;

        $detalles_pedido->save();

        return view('agradecimiento');
    }
}