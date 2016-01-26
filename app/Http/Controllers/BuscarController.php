<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BuscarController extends Controller
{
    //Funcion para filtrar los INSUMOS en las tablas de BOOTSTRAP-TABLE
    public function getFiltrarinsumos(Request $request){
    	if(!$request->ajax()) abort(403);

    	$datos = array();

    	$inputs = $request->all();

    	if(empty($inputs['search'])){
    		$insumos = \App\Insumo::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id', 'nombre', 'costo', 'precio', 'expiracion')->where('id', '>', 0)->take($inputs['limit'])->skip($inputs['offset'])->orderBy('nombre', 'ASC')->get();
    	}else{
    		$insumos = \App\Insumo::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id', 'nombre', 'costo', 'precio', 'expiracion')->where('nombre', 'LIKE', '%'.$inputs["search"].'%')->take($inputs['limit'])->skip($inputs['offset'])->orderBy('nombre', 'ASC')->get();
    	}
    	$cantidad = \DB::select(\DB::raw("SELECT FOUND_ROWS() AS total;"));
        $cantidad = $cantidad[0]->total;
    	$n = 1;

    	foreach ($insumos as $insumo) {
            $url = '<a href="'.route('insumo.edit', $insumo->id).'" class="btn btn-xs btn-success"><i class="fa fa-btn fa-edit"></i>Editar</a>';
            
            $datos[] = [
                'num' => $n++,
                'name' => $insumo->nombre,
                'cost' => $insumo->costo,
                'price' => $insumo->precio,
                'exp' => $insumo->expiracion,
                'act' => $url
            ];
        }

        return \Response::json(['total' => $cantidad, 'rows' => $datos]);        
    }
    //Funcion para filtrar las TIPO INSUMO en las tablas de BOOTSTRAP-TABLE
    public function getFiltrartipoinsumo(Request $request){
        if(!$request->ajax()) abort(403);

        $datos = array();

        $inputs = $request->all();

        if(empty($inputs['search'])){
            $tipoInsumos = \App\TipoInsumo::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id', 'tipo')->where('id', '>', 0)->take($inputs['limit'])->skip($inputs['offset'])->orderBy('tipo', 'ASC')->get();
        }else{
            $tipoInsumos = \App\TipoInsumo::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id', 'tipo')->where('tipo', 'LIKE', '%'.$inputs["search"].'%')->take($inputs['limit'])->skip($inputs['offset'])->orderBy('tipo', 'ASC')->get();
        }
        $cantidad = \DB::select(\DB::raw("SELECT FOUND_ROWS() AS total;"));
        $cantidad = $cantidad[0]->total;
        $n = 1;

        foreach ($tipoInsumos as $tipoInsumo) {
            $url = '<a href="'.route('tipo-insumo.edit', $tipoInsumo->id).'" class="btn btn-xs btn-success"><i class="fa fa-btn fa-edit"></i>Editar</a>';
            
            $datos[] = [
                'num' => $n++,
                'insumo' => $tipoInsumo->tipo,
                'act' => $url
            ];
        }

        return \Response::json(['total' => $cantidad, 'rows' => $datos]);        
    }
    //Funcion para filtrar las TIPO-RAZAS en las tablas de BOOTSTRAP-TABLE
    public function getFiltrartiporaza(Request $request){
        if(!$request->ajax()) abort(403);

        $datos = array();

        $inputs = $request->all();

        if(empty($inputs['search'])){
            $tipoRazas = \App\TipoRaza::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id', 'tipo_raza')->where('id', '>', 0)->take($inputs['limit'])->skip($inputs['offset'])->orderBy('tipo_raza', 'ASC')->get();
        }else{
            $tipoRazas = \App\TipoRaza::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id', 'tipo_raza')->where('tipo_raza', 'LIKE', '%'.$inputs["search"].'%')->take($inputs['limit'])->skip($inputs['offset'])->orderBy('tipo_raza', 'ASC')->get();
        }
        $cantidad = \DB::select(\DB::raw("SELECT FOUND_ROWS() AS total;"));
        $cantidad = $cantidad[0]->total;
        $n = 1;

        foreach ($tipoRazas as $tipoRaza) {
            $url = '<a href="'.route('tipo-raza.edit', $tipoRaza->id).'" class="btn btn-xs btn-success"><i class="fa fa-btn fa-edit"></i>Editar</a>';
            
            $datos[] = [
                'num' => $n++,
                'raza' => $tipoRaza->tipo_raza,
                'act' => $url
            ];
        }

        return \Response::json(['total' => $cantidad, 'rows' => $datos]);        
    }
    //Funcion para filtrar las UNIDADES en las tablas de BOOTSTRAP-TABLE
    public function getFiltrarunidades(Request $request){
        if(!$request->ajax()) abort(403);

        $datos = array();

        $inputs = $request->all();

        if(empty($inputs['search'])){
            $unidades = \App\Unidad::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id', 'unidad')->where('id', '>', 0)->take($inputs['limit'])->skip($inputs['offset'])->orderBy('unidad', 'ASC')->get();
        }else{
            $unidades = \App\Unidad::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id', 'unidad')->where('unidad', 'LIKE', '%'.$inputs["search"].'%')->take($inputs['limit'])->skip($inputs['offset'])->orderBy('unidad', 'ASC')->get();
        }
        $cantidad = \DB::select(\DB::raw("SELECT FOUND_ROWS() AS total;"));
        $cantidad = $cantidad[0]->total;
        $n = 1;

        foreach ($unidades as $unidad) {
            $url = '<a href="'.route('unidad.edit', $unidad->id).'" class="btn btn-xs btn-success"><i class="fa fa-btn fa-edit"></i>Editar</a>';
            
            $datos[] = [
                'num' => $n++,
                'unidad' => $unidad->unidad,
                'act' => $url
            ];
        }

        return \Response::json(['total' => $cantidad, 'rows' => $datos]);        
    }
    //Funcion para filtrar las RAZAS en las tablas de BOOTSTRAP-TABLE
    public function getFiltrarrazas(Request $request){
        if(!$request->ajax()) abort(403);

        $datos = array();

        $inputs = $request->all();

        if(empty($inputs['search'])){
            $razas = \App\Raza::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id', 'raza', 'id_tipo_raza')->where('id', '>', 0)->take($inputs['limit'])->skip($inputs['offset'])->orderBy('created_at', 'ASC')->get();
        }else{
            $razas = \App\Raza::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id', 'raza', 'id_tipo_raza')->where('raza', 'LIKE', '%'.$inputs["search"].'%')->take($inputs['limit'])->skip($inputs['offset'])->orderBy('created_at', 'ASC')->get();
        }
        $cantidad = \DB::select(\DB::raw("SELECT FOUND_ROWS() AS total;"));
        $cantidad = $cantidad[0]->total;
        $n = 1;
        
        foreach ($razas as $raza) {
            $url = '<a href="'.route('raza.edit', $raza->id).'" class="btn btn-xs btn-success"><i class="fa fa-btn fa-edit"></i>Editar</a>';
            
            $datos[] = [
                'num' => $n++,
                'raza' => $raza->raza,
                'tipo' => \App\TipoRaza::where('id', $raza->id_tipo_raza)->first()->tipo_raza,
                'act' => $url
            ];
        }

        return \Response::json(['total' => $cantidad, 'rows' => $datos]);        
    }
    //Funcion para filtrar las PROVEEDOR en las tablas de BOOTSTRAP-TABLE
    public function getFiltrarproveedor(Request $request){
        if(!$request->ajax()) abort(403);

        $datos = array();

        $inputs = $request->all();

        if(empty($inputs['search'])){
            $proveedores = \App\Proveedor::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id', 'nombre', 'ruc', 'proveedor')->where('id', '>', 0)->take($inputs['limit'])->skip($inputs['offset'])->orderBy('created_at', 'ASC')->get();
        }else{
            $proveedores = \App\Proveedor::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id', 'nombre', 'ruc', 'proveedor')->where('nombre', 'LIKE', '%'.$inputs["search"].'%')->take($inputs['limit'])->skip($inputs['offset'])->orderBy('created_at', 'ASC')->get();
        }
        $cantidad = \DB::select(\DB::raw("SELECT FOUND_ROWS() AS total;"));
        $cantidad = $cantidad[0]->total;
        $n = 1;
        
        foreach ($proveedores as $proveedor) {
            $url = '<a href="'.route('proveedor.edit', $proveedor->id).'" class="btn btn-xs btn-success"><i class="fa fa-btn fa-edit"></i>Editar</a>';
            
            $datos[] = [
                'num' => $n++,
                'name' => $proveedor->nombre,
                'ruc' => $proveedor->ruc,
                'proveedor' => $proveedor->proveedor,
                'act' => $url
            ];
        }

        return \Response::json(['total' => $cantidad, 'rows' => $datos]);        
    }

    //Funcion para filtrar las compras en las tablas de BOOTSTRAP-TABLE
    public function getFiltrarcompra(Request $request){

        if(!$request->ajax()) abort(403);

        $datos = array();

        $inputs = $request->all();

        if(empty($inputs['search'])){
            $compras = \App\Compra::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id')->where('id', '>', 0)->take($inputs['limit'])->skip($inputs['offset'])->orderBy('created_at', 'ASC')->get();
        }else{
            $compras = \App\Compra::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id')->where('numfactura', 'LIKE', '%'.$inputs["search"].'%')->take($inputs['limit'])->skip($inputs['offset'])->orderBy('created_at', 'ASC')->get();
        }
        $cantidad = \DB::select(\DB::raw("SELECT FOUND_ROWS() AS total;"));
        $cantidad = $cantidad[0]->total;
        $n = 1;
        
        foreach ($compras as $compra) {
            $url = '<a href="'.route('compra.edit', $compra->id).'" class="btn btn-xs btn-success"><i class="fa fa-btn fa-edit"></i>Editar</a>';
            
            $datos[] = [
                'num' => $n++,
                'numfactura' => $compra->numfactura,
                'proveedor' => \App\Proveedor::where('id', $compra->id_proveedor)->first()->proveedor,
                'total' =>  number_format($compra->total, 2, '.', ''),
                'act' => $url
            ];
        }

        return \Response::json(['total' => $cantidad, 'rows' => $datos]); 
    }

    //Funcion para filtrar las animales en las tablas de BOOTSTRAP-TABLE
    public function getFiltraranimal(Request $request){

        if(!$request->ajax()) abort(403);

        $datos = array();

        $inputs = $request->all();

        if(empty($inputs['search'])){
            $animales = \App\Animal::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id')->where('id', '>', 0)->take($inputs['limit'])->skip($inputs['offset'])->orderBy('created_at', 'ASC')->get();
        }else{
            $animales = \App\Animal::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id')->where('animal', 'LIKE', '%'.$inputs["search"].'%')->take($inputs['limit'])->skip($inputs['offset'])->orderBy('created_at', 'ASC')->get();
        }
        $cantidad = \DB::select(\DB::raw("SELECT FOUND_ROWS() AS total;"));
        $cantidad = $cantidad[0]->total;
        $n = 1;
        
        foreach ($animales as $animal) {
            $url = '<a href="'.route('animales.edit', $animal->id).'" class="btn btn-xs btn-success"><i class="fa fa-btn fa-edit"></i>Editar</a>';
            
            $datos[] = [
                'num' => $n++,
                'animal' => $animal->animal,
                'act' => $url
            ];
        }

        return \Response::json(['total' => $cantidad, 'rows' => $datos]); 
    }

    public function getInsumos(){
        if(!\Request::ajax()) abort(403);

        $insumos = \App\Insumo::select('nombre', 'id')->get();

        return $insumos;
    }

}
