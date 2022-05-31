<?php

namespace App\Http\Controllers;

use App\Models\compraventa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class compraventaController extends Controller
{
    public function mostrarCompraventa()
    {
        $listaProductos = compraventa::all();

        return view('compraventa/compraventa', ['datosCompraventa' => $listaProductos]);
    }

    public function mostrarProductosCompraventa()
    {
        $listaProductos = DB::select('SELECT * FROM compraventas WHERE id_user = ' . auth()->user()->id);

        return view('compraventa/compraventa_administrar', ['datosCompraventa' => $listaProductos]);
    }

    public function menuNuevoCompraventa()
    {
        return view('compraventa/nuevoProdCompraventa');
    }

    public function nuevoProdCompraventa(Request $request)
    {
        $producto_compraventa = new compraventa;

        $id_user = auth()->user()->id;
        $producto_compraventa->id_user = $id_user;

        if ($request->hasFile('nueva_imagen')) {
            $file = $request->file("nueva_imagen");
            $nombre = bin2hex(random_bytes(5)) . "." . $file->guessExtension();
            $ruta = "img/compraventa/" . $nombre;
            $destino = public_path($ruta);

            copy($file, $destino);
            $producto_compraventa->imagen = $ruta;
        }

        $nombre_producto = $request->nombre_producto;
        $producto_compraventa->nombre_producto = $nombre_producto;

        $descripcion_producto = $request->descripcion_producto;
        $producto_compraventa->descripcion_producto = $descripcion_producto;

        $precio = $request->precio;
        $producto_compraventa->precio = $precio;

        $contacto = $request->contacto;
        $producto_compraventa->contacto = $contacto;

        $producto_compraventa->save();

        $listaProductos = DB::select('SELECT * FROM compraventas WHERE id_user = ' . auth()->user()->id);

        return view('compraventa/compraventa_administrar', ['datosCompraventa' => $listaProductos]);
    }

    public function productoUnicoCompraventa($id)
    {
        $producto = compraventa::find($id);
        return view('compraventa/productoCompraventa', ["producto" => $producto]);
    }

    public function borrarProdCompraventa($id)
    {
        $producto = compraventa::find($id);
        $producto->delete();

        $listaProductos = DB::select('SELECT * FROM compraventas WHERE id_user = ' . auth()->user()->id);

        return view('compraventa/compraventa_administrar', ['datosCompraventa' => $listaProductos]);
    }
}