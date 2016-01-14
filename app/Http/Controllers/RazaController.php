<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('raza.create');
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
        $rules = [
            'raza' => 'required',
            'id_tipo_raza' => ['required','not_in:0']
        ];
        //Validamos los datos recibidos con las reglas.
        $this->validate($request, $rules);

        $raza = new \App\Raza;
        $raza->raza = $request->input('raza');
        $raza->id_tipo_raza = $request->input('id_tipo_raza');
        $raza->descripcion = trim($request->input('descripcion'));
        $raza->save();

        $request->session()->flash('msj_success', 'Se ha agregado la raza: '. $request->input('raza'));
        return redirect()->route('raza.index');

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
        $raza = \App\Raza::find($id);
        return view('raza.edit', compact('raza'));
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
        $rules = [
            'raza' => 'required',
            'id_tipo_raza' => ['required','not_in:0']
        ];
        //Validamos los datos recibidos con las reglas.
        $this->validate($request, $rules);

        $raza = \App\Raza::find($id);
        $raza->raza = $request->input('raza');
        $raza->id_tipo_raza = $request->input('id_tipo_raza');
        $raza->descripcion = trim($request->input('descripcion'));
        $raza->save();

        $request->session()->flash('msj_success', 'Se ha editado la raza: '. $request->input('raza'));
        return redirect()->route('raza.index');
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
