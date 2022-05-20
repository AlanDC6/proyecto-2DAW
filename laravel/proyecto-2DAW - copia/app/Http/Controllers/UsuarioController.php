<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarUsuarioRequest;
use App\Http\Requests\GuardarUsuarioRequest;
use App\Http\Resources\UsuarioResource;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UsuarioResource::collection(Usuario::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarUsuarioRequest $request)
    {
        $nuevoUsuario = new Usuario;
        
        $nuevoUsuario->nombre = $request->nombre;
        $nuevoUsuario->apellidos = $request->apellidos;
        $nuevoUsuario->email = $request->email;
        $nuevoUsuario->contraseña = Hash::make($request->contraseña);
        $nuevoUsuario->genero = $request->genero;

        // return new UsuarioResource(Usuario::create(           
            $nuevoUsuario->save();
            return response()->json([
                'res' => true,
                'msg' => 'Usuario creado correctamente'
            ]);
        // ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new UsuarioResource(Usuario::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarUsuarioRequest $request, $id)
    {
        Usuario::find($id)->update($request->all());
        return (new UsuarioResource(Usuario::find($id)))
        ->additional(['msg' => 'Usuario actualizado corractamente'])
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
        Usuario::find($id)->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Usuario eliminado correctamente'
        ]);
    }
}
