<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InsumosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('insumo.create');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Asigna todo los datos a $data
        $data = $request->all();

        $insumo = new \App\Insumo;
        $insumo->nombre = $data['nombre'];
        $insumo->descripcion = $data['descripcion'];
        $insumo->costo = $data['costo'];
        $insumo->precio = $data['precio'];
        $insumo->id_tipo = $data['tipo'];
        $insumo->id_unidad = $data['unidad'];
        $insumo->expiracion = $data['expiracion'];
        $insumo->save();

        \Session::flash('msj_success', 'Se ha almacenado correctamente el insumo: '.$data['nombre']);
        return redirect()->route('insumo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $insumo = \App\Insumo::find($id);

        return view('insumo.edit')->with('insumo', $insumo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $insumo = \App\Insumo::find($id);

        $insumo->nombre = $data['nombre'];
        $insumo->descripcion = $data['descripcion'];
        $insumo->costo = $data['costo'];
        $insumo->precio = $data['precio'];
        $insumo->id_tipo = $data['id_tipo'];
        $insumo->id_unidad = $data['id_unidad'];
        $insumo->expiracion = $data['expiracion'];
        $insumo->save();

        \Session::flash('msj_success', 'Se ha editado correctamente el insumo: '.$data['nombre']);
        return redirect()->route('insumo.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
