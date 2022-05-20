<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarZapatosRequest;
use App\Http\Requests\GuardarZapatosRequest;
use App\Http\Resources\ZapatosResource;
use App\Models\Zapatos;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ZapatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ZapatosResource::collection(Zapatos::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarZapatosRequest $request)
    {
        return new ZapatosResource(Zapatos::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ZapatosResource(Zapatos::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarZapatosRequest $request, $id)
    {
        Zapatos::find($id)->update($request->all());
        return (new ZapatosResource(Zapatos::find($id)))
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
        Zapatos::find($id)->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Zapato eliminado correctamente'
        ]);
    }
}
