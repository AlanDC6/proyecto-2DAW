<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Support\Facades\DB;

class productoController extends Controller
{
    // --- Mostrar todos los productos ---
    public function mostrarProductos()
    {
        $listaProductos = producto::all();

        return view('comprar', ['datosProductos' => $listaProductos]);
    }

    // --- Mostrar ropa ---
    public function mostrarRopa()
    {
        $listaProductos = DB::select('SELECT * FROM productos WHERE tipo = ?', ['ropa']);

        return view('comprar', ['datosProductos' => $listaProductos]);
    }

    // --- Mostrar calzado ---
    public function mostrarCalzado()
    {
        $listaProductos = DB::select('SELECT * FROM productos WHERE tipo = ?', ['calzado']);

        return view('comprar', ['datosProductos' => $listaProductos]);
    }

    // --- Mostrar complementos ---
    public function mostrarComplementos()
    {
        $listaProductos = DB::select('SELECT * FROM productos WHERE tipo = ?', ['complementos']);

        return view('comprar', ['datosProductos' => $listaProductos]);
    }

    // --- Mostrar hombre ---
    public function mostrarHombre()
    {
        $listaProductos = DB::select('SELECT * FROM productos WHERE genero = ?', ['masculino']);

        return view('comprar', ['datosProductos' => $listaProductos]);
    }

    // --- Mostrar mujer ---
    public function mostrarMujer()
    {
        $listaProductos = DB::select('SELECT * FROM productos WHERE genero = ?', ['femenino']);

        return view('comprar', ['datosProductos' => $listaProductos]);
    }

    // --- Mostrar solo un producto ---
    public function mostrarProductoUnico($id)
    {
        $producto = producto::find($id);
        return view('producto', ["producto" => $producto]);
    }
}