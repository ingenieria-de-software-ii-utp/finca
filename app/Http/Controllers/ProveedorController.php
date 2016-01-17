<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('proveedor.create');
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
            'nombre' => 'required',
            'ruc' => 'required',
            'proveedor' => 'required',
        ];

        $this->validate($request, $rules);

        $prov = new \App\Proveedor;
        $prov->proveedor = $request->input('proveedor');
        $prov->direccion = $request->input('direccion');
        $prov->save();

        $request->session()->flash('msj_success', 'Se ha agregado el proveedor: '. $request->input('proveedor'));
        return redirect()->route('proveedor.index');
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
        $proveedor = \App\Proveedor::find($id);
        return view('proveedor.edit', compact('proveedor'));
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
            'nombre' => 'required',
            'ruc' => 'required',
            'proveedor' => 'required',
        ];

        $this->validate($request, $rules);

        $prov = \App\Proveedor::find($id);
        $prov->proveedor = $request->input('proveedor');
        $prov->direccion = $request->input('direccion');
        $prov->save();

        $request->session()->flash('msj_success', 'Se ha editado el proveedor: '. $request->input('proveedor'));
        return redirect()->route('proveedor.index');
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
