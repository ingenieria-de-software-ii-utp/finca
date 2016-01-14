<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TipoInsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tipo-insumo.create');
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
        //Validamos
        $this->validate($request, ['tipo' => 'required']);

        //Almacenamos
        $tipoInsumo = new \App\TipoInsumo;
        $tipoInsumo->tipo = $request->input('tipo');
        $tipoInsumo->save();

        $request->session()->flash('msj_success', 'Se ha agregado correctamente el insumo: '. $request->input('tipo'));
        return redirect()->route('tipo-insumo.index');
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
        $tipoInsumo = \App\TipoInsumo::find($id);
        return view('tipo-insumo.edit')->with('tipoInsumo', $tipoInsumo);
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
        $this->validate($request, ['tipo' => 'required']);

        $tipoInsumo = \App\TipoInsumo::find($id);
        $tipoInsumo->tipo = $request->input('tipo');
        $tipoInsumo->save();

        $request->session()->flash('msj_success', 'Se ha actualizado el insumo: '. $request->input('tipo'));
        return redirect()->route('tipo-insumo.index');
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
