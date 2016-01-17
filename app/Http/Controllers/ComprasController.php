<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('compras.create');
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
        $datos = $request->all();

        $compra = new \App\Compra;
        $compra->numfactura = $datos['numfactura'];
        $compra->id_proveedor = $datos['id_proveedor'];
        $compra->date = $datos['date'];
        $compra->subtotal = $datos['subtotal'];
        $compra->impuesto = $datos['impuesto'];
        $compra->descuento = $datos['descuento'];
        $compra->total = $datos['total'];
        $compra->id_tipo_pago = $datos['id_tipo_pago'];
        $compra->save();

        $id_compra = $compra->id;
        foreach ($datos['cantidad'] as $key => $cantidad) {
           
            $det_compra = new \App\DetalleCompra;
            $det_compra->id_compra = $id_compra;
            $det_compra->id_producto = $datos['id_producto'][$key];
            $det_compra->cantidad = $cantidad;
            $det_compra->precio = $datos['precio'][$key];
            $det_compra->subtotal_prod = $datos['subtotal_prod'][$key];
            $det_compra->save();
        }

        $request->session()->flash('msj_success', 'Se ha registrado la compra #'. $datos['numfactura']);
        return redirect()->route('compra.index');
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
        $compra = \App\Compra::find($id);        
        $det_compras = \App\DetalleCompra::where('id_compra', $id)->where('inactivo', 0)->get();
        return view('compras.edit')->with('compra', $compra)->with('det_compras', $det_compras);
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

        $datos = $request->all();

        $compra = \App\Compra::find($id);
        $compra->numfactura = $datos['numfactura'];
        $compra->id_proveedor = $datos['id_proveedor'];
        $compra->date = $datos['date'];
        $compra->subtotal = $datos['subtotal'];
        $compra->impuesto = $datos['impuesto'];
        $compra->descuento = $datos['descuento'];
        $compra->total = $datos['total'];
        $compra->id_tipo_pago = $datos['id_tipo_pago'];
        $compra->save();

        $det_compras = \App\DetalleCompra::where('id_compra', $id)->get();
        $oldCantCompra = $det_compras->count();
        $newCantCompra = count($datos['cantidad']);
       
        foreach ($det_compras as $key => $detalle) {
            //si no encuentra datos en el siguiente campo entonces elimina sino continua actualizando
            if(empty($datos['id_producto'][$key])){
            
                $borrar_detalle = \App\DetalleCompra::find($detalle->id);
                $borrar_detalle->inactivo = 1;
                $borrar_detalle->save();

            }else{
                $detalle->id_producto = $datos['id_producto'][$key];
                $detalle->cantidad = $datos['cantidad'][$key];
                $detalle->precio = $datos['precio'][$key];
                $detalle->subtotal_prod = $datos['subtotal_prod'][$key];
                $detalle->save();
                
            }
            
        }
        //Si el array $datos['cantidad'] es mayor a la cantidad de datos que tiene el detalle compra
        //entonces se añade una nueva compra
        if($newCantCompra > $oldCantCompra){
            for($i = $newCantCompra - 1; $i<$newCantCompra; $i++){
                $detalle = new \App\DetalleCompra;
                $detalle->id_compra = $id;
                $detalle->id_producto = $datos['id_producto'][$i];
                $detalle->cantidad = $datos['cantidad'][$i];
                $detalle->precio = $datos['precio'][$i];
                $detalle->subtotal_prod = $datos['subtotal_prod'][$i];
                $detalle->save();
                
            }
                
        }


        $request->session()->flash('msj_success', 'Se ha editado la compra: '.$datos['numfactura']);
        return redirect()->route('compra.index');
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
