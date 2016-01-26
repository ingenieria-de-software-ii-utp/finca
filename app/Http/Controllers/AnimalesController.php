<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AnimalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('animales.create');
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
        $rules =[
            'animal' => 'required',
            'id_raza' => ['required', 'not_in:0'], 
            'id_estado' => ['required', 'not_in:0']
        ];

        $this->validate($request, $rules);

        $datos = $request->all();

        $animal = new \App\Animal;
        $animal->animal = $datos['animal'];
        $animal->id_raza = $datos['id_raza'];
        $animal->descripcion = $datos['descripcion'];
        $animal->id_estado = $datos['id_estado'];
        $animal->save();

        $request->session()->flash('msj_success', 'Se ha registrado correctamente el animal: '.$datos['animal']);
        return redirect()->route('animales.index');
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
        $animal = \App\Animal::find($id);
        return view('animales.edit')->with(compact('animal'));
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
        $rules =[
            'animal' => 'required',
            'id_raza' => ['required', 'not_in:0'], 
            'id_estado' => ['required', 'not_in:0']
        ];

        $this->validate($request, $rules);

        $datos = $request->all();

        $animal = \App\Animal::find($id);
        $animal->animal = $datos['animal'];
        $animal->id_raza = $datos['id_raza'];
        $animal->descripcion = $datos['descripcion'];
        $animal->id_estado = $datos['id_estado'];
        $animal->save();

        $request->session()->flash('msj_success', 'Se ha actualizado correctamente el animal: '.$datos['animal']);
        return redirect()->route('animales.index');
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
