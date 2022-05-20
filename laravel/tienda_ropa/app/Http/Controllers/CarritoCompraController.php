<?php

namespace App\Http\Controllers;

use App\Models\carritoCompra;
use App\Http\Requests\StorecarritoCompraRequest;
use App\Http\Requests\UpdatecarritoCompraRequest;

class CarritoCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecarritoCompraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecarritoCompraRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carritoCompra  $carritoCompra
     * @return \Illuminate\Http\Response
     */
    public function show(carritoCompra $carritoCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carritoCompra  $carritoCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(carritoCompra $carritoCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecarritoCompraRequest  $request
     * @param  \App\Models\carritoCompra  $carritoCompra
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecarritoCompraRequest $request, carritoCompra $carritoCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carritoCompra  $carritoCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy(carritoCompra $carritoCompra)
    {
        //
    }
}
