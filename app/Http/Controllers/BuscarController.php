<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BuscarController extends Controller
{
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

    public function getFiltrarproveedor(Request $request){
        if(!$request->ajax()) abort(403);

        $datos = array();

        $inputs = $request->all();

        if(empty($inputs['search'])){
            $proveedores = \App\Proveedor::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id', 'proveedor')->where('id', '>', 0)->take($inputs['limit'])->skip($inputs['offset'])->orderBy('created_at', 'ASC')->get();
        }else{
            $proveedores = \App\Proveedor::select(\DB::raw('SQL_CALC_FOUND_ROWS *'), 'id', 'proveedor')->where('proveedor', 'LIKE', '%'.$inputs["search"].'%')->take($inputs['limit'])->skip($inputs['offset'])->orderBy('created_at', 'ASC')->get();
        }
        $cantidad = \DB::select(\DB::raw("SELECT FOUND_ROWS() AS total;"));
        $cantidad = $cantidad[0]->total;
        $n = 1;
        
        foreach ($proveedores as $proveedor) {
            $url = '<a href="'.route('proveedor.edit', $proveedor->id).'" class="btn btn-xs btn-success"><i class="fa fa-btn fa-edit"></i>Editar</a>';
            
            $datos[] = [
                'num' => $n++,
                'proveedor' => $proveedor->proveedor,
                'act' => $url
            ];
        }

        return \Response::json(['total' => $cantidad, 'rows' => $datos]);        
    }
}
