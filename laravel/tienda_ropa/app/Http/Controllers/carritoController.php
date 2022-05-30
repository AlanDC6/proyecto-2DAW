<?php

namespace App\Http\Controllers;

use App\Models\carritoCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class carritoController extends Controller
{
    public function guardarProductoCarrito(Request $request)
    {
        $carrito = new carritoCompra();

        $id_producto = $request->id_producto;
        $carrito->id_producto = $id_producto;

        $id_user = auth()->user()->id;
        $carrito->id_user = $id_user;

        $carrito->save();

        return redirect('/');
    }

    public function mostrarProductoCarrito()
    {
        $carrito = DB::select('SELECT carrito_compras.id,productos.imagen, productos.titulo, productos.precio, productos.descripcion, carrito_compras.cantidad FROM carrito_compras JOIN productos ON carrito_compras.id_producto = productos.id JOIN users ON carrito_compras.id_user= users.id  WHERE carrito_compras.id_user =' . auth()->user()->id . '');

        $precioTotal = DB::select('SELECT SUM((productos.precio*carrito_compras.cantidad)) AS total FROM carrito_compras JOIN productos ON carrito_compras.id_producto = productos.id JOIN users ON carrito_compras.id_user= users.id  WHERE carrito_compras.id_user =' . auth()->user()->id . '');

        return view('carritoCompra')->with('datosCarrito', $carrito)->with('precioTotal', $precioTotal);
    }

    public function actualizarCantidad(Request $request, $id)
    {
        $articulo = carritoCompra::find($id);

        $cantidad = $request->input('cantidad' . $articulo->id);
        $articulo->cantidad = $cantidad;

        $articulo->save();

        return redirect('/carritoCompra');
    }

    public function eliminarProdCarrito(Request $request)
    {
        $id = (int) $request->input('id_borrar');

        $articulo = carritoCompra::find($id);
        $articulo->delete();

        return redirect('/carritoCompra');
    }
}