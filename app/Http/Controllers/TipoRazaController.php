<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TipoRazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tipo-raza.create');
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
        $this->validate($request, ['tipo_raza' => 'required']);

        $tipoRaza = new \App\TipoRaza;
        $tipoRaza->tipo_raza = $request->input('tipo_raza');
        $tipoRaza->save();

        $request->session()->flash('msj_success', 'Se ha agregado el tipo de raza: '. $request->input('tipo_raza'));
        return redirect()->route('tipo-raza.index');
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
        $tipoRaza = \App\TipoRaza::find($id);         

        return view('tipo-raza.edit')->with('tipoRaza', $tipoRaza);
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
        $this->validate($request, ['tipo_raza' => 'required']);

        $tipoRaza = \App\TipoRaza::find($id);
        $tipoRaza->tipo_raza = $request->input('tipo_raza');
        $tipoRaza->save();

        $request->session()->flash('msj_success', 'Se ha actualizado la raza: '. $request->input('tipo_raza'));
        return redirect()->route('tipo-raza.index');
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
