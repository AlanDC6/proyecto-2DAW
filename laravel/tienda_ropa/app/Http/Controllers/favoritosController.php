<?php

namespace App\Http\Controllers;

use App\Models\favoritos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class favoritosController extends Controller
{
    public function mostrarFavoritos()
    {
        $favoritos = DB::select('SELECT favoritos.id, productos.titulo, productos.precio, productos.descripcion, productos.imagen FROM favoritos JOIN productos ON favoritos.id_producto = productos.id JOIN users ON favoritos.id_user= users.id WHERE favoritos.id_user =' . auth()->user()->id . '');

        return view('favoritos')->with('datosFavoritos', $favoritos);
    }

    public function añadirFavorito(Request $request)
    {
        $carrito = new favoritos();

        $id_producto = $request->id_producto;
        $carrito->id_producto = $id_producto;

        $id_user = auth()->user()->id;
        $carrito->id_user = $id_user;

        $carrito->save();

        return redirect('/');
    }

    public function eliminarFavorito(Request $request)
    {
        $id = (int) $request->input('id_borrar');

        $articulo = favoritos::find($id);
        $articulo->delete();

        return redirect('/favoritos');
    }
}