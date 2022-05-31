<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\producto;
use Illuminate\Http\Request;

class adminController extends Controller
{
    // ----- MOSTRAR PRODUCTOS -----

    // --- Mostrar todos los productos ---
    public function mostrarProductos()
    {
        $listaProductos = producto::all();

        return view('administrar/administrar', ['datosProductos' => $listaProductos]);
    }
    // ----- FIN MOSTRAR PRODUCTOS -----

    // ----- AÑADIR PRODUCTO -----
    public function menuNuevo()
    {
        return view('administrar/nuevoProd');
    }

    public function nuevoProd(Request $request)
    {
        $producto = new producto;

        $titulo = $request->titulo;
        $producto->titulo = $titulo;

        $descripcion = $request->descripcion;
        $producto->descripcion = $descripcion;

        $tipo = $request->tipo;
        $producto->tipo = $tipo;

        $marca = $request->marca;
        $producto->marca = $marca;

        $genero = $request->genero;
        $producto->genero = $genero;

        $categoria_prenda = $request->categoria_prenda;
        $producto->categoria_prenda = $categoria_prenda;

        $precio = $request->precio;
        $producto->precio = $precio;

        $valoracion = $request->valoracion;
        $producto->valoracion = $valoracion;

        $producto->save();

        return redirect('/administrar');
    }
    // ----- FIN AÑADIR PRODUCTO -----

    // ----- BORRAR PRODUCTO -----
    public function borrar($id)
    {
        $producto = producto::find($id);
        $producto->delete();

        $ruta_img = public_path($producto->imagen);
        if ($ruta_img) {
            unlink($ruta_img);
        }

        $ruta_img2 = public_path($producto->img2);
        if ($ruta_img2) {
            unlink($ruta_img2);
        }

        $ruta_img3 = public_path($producto->img3);
        if ($ruta_img3) {
            unlink($ruta_img3);
        }

        $ruta_img4 = public_path($producto->img4);
        if ($ruta_img4) {
            unlink($ruta_img4);
        }

        return redirect('/administrar');
    }
    // ----- FIN BORRAR PRODUCTO -----

    // ----- EDITAR PRODUCTO -----
    public function menuEditar($id)
    {
        $producto = producto::find($id);
        return view('administrar/editarProd', ["producto" => $producto]);
    }

    public function confirmarCambios(Request $request, $id)
    {
        $producto = producto::find($id);

        $titulo = $request->input('titulo');
        $producto->titulo = $titulo;

        $descripcion = $request->input('descripcion');
        $producto->descripcion = $descripcion;

        $marca = $request->input('marca');
        $producto->marca = $marca;

        $tipo = $request->input('tipo');
        $producto->tipo = $tipo;

        $genero = $request->input('genero');
        $producto->genero = $genero;

        $categoria_prenda = $request->input('categoria_prenda');
        $producto->categoria_prenda = $categoria_prenda;

        $precio = $request->input('precio');
        $producto->precio = $precio;

        // Imagen principal
        if ($request->hasFile('nueva_imagen')) {
            $file = $request->file("nueva_imagen");
            $nombre = bin2hex(random_bytes(5)) . "." . $file->guessExtension();
            $ruta = "img/productos/" . $id . "/" . $nombre;
            $destino = public_path($ruta);

            if ($producto->imagen != 'img/productos/default.jpg') {
                $ruta_img = public_path($producto->imagen);
                if ($ruta_img) {
                    unlink($ruta_img);
                }
            }

            copy($file, $destino);
            $producto->imagen = $ruta;
        }

        //Imagenes secundarias
        if ($request->hasFile('img2')) {
            $file2 = $request->file("img2");
            $nombre2 = bin2hex(random_bytes(5)) . "." . $file2->guessExtension();
            $ruta2 = "img/productos/" . $id . "/" . $nombre2;
            $destino2 = public_path($ruta2);

            if ($producto->img2 != 'img/productos/default.jpg') {
                $ruta_img2 = public_path($producto->img2);
                if ($ruta_img2) {
                    unlink($ruta_img2);
                }
            }

            copy($file2, $destino2);
            $producto->img2 = $ruta2;
        }

        //Imagenes secundarias
        if ($request->hasFile('img3')) {
            $file3 = $request->file("img3");
            $nombre3 = bin2hex(random_bytes(5)) . "." . $file3->guessExtension();
            $ruta3 = "img/productos/" . $id . "/" . $nombre3;
            $destino3 = public_path($ruta3);

            if ($producto->img3 != 'img/productos/default.jpg') {
                $ruta_img3 = public_path($producto->img3);
                if ($ruta_img3) {
                    unlink($ruta_img3);
                }
            }

            copy($file3, $destino3);
            $producto->img3 = $ruta3;
        }

        //Imagenes secundarias
        if ($request->hasFile('img4')) {
            $file4 = $request->file("img4");
            $nombre4 = bin2hex(random_bytes(5)) . "." . $file4->guessExtension();
            $ruta4 = "img/productos/" . $id . "/" . $nombre4;
            $destino4 = public_path($ruta4);

            if ($producto->img4 != 'img/productos/default.jpg') {
                $ruta_img4 = public_path($producto->img4);
                if ($ruta_img4) {
                    unlink($ruta_img4);
                }
            }

            copy($file4, $destino4);
            $producto->img4 = $ruta4;
        }

        $producto->save();

        return redirect('/administrar');
    }
    // ----- FIN EDITAR PRODUCTO -----
}