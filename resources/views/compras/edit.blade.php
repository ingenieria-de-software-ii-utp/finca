@extends('layouts.app')

@section('title') Editar compra @stop

@section('content')
	
	{{-- Muestra el mensaje si existe la variable msj_success --}}
	@if(Session::has('msj_success'))
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
		  <strong> {{ Session::get('msj_success') }} </strong>
		</div>
	@endif


	{!! Form::model($compra, ['route' => ['compra.update', $compra->id], 'method' => 'PATCH']) !!}
		<h3>Datos de Factura</h3>
		<div class="well well-sm">
			<div class="row">
				
				<div class="form-group col-sm-4">
					{!! Form::label('date', 'Fecha:') !!}
					{!! Form::text('date', null, ['class' => 'form-control datepicker', 'placeholder' => 'MM/DD/AAAA']) !!}	
				</div>
			
				<div class="form-group col-sm-4">
					{!! Form::label('numfactura', 'N° Factura')!!}
					{!! Form::text('numfactura', null, ['class' => 'form-control', 'placeholder' => 'Número de Factura']) !!}
				</div>
				<div class="form-group col-sm-4">
					{!! Form::label('id_proveedor', 'Proveedor:')!!}
					{!! Form::select('id_proveedor', ['0' => 'Seleccione Proveedor'] + \App\Proveedor::lists('proveedor', 'id')->toArray(), null, ['class' => 'form-control']) !!}
				</div>
			</div>
		</div>

		
		<div class="panel panel-default">
			<div class="panel-heading">
				Registro de Compra
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<a id="add_row" class="btn btn-default pull-right"><i class="fa fa-btn fa-plus"></i>Agregar Fila</a><br><br>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-collapsed" id="tabla">
						<thead>
							<tr class="success">
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Precio</th>
								<th>Subtotal</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
							{{--*/$x = 0;/*--}}
							@foreach($det_compras as $det_compra)
							{{--dd($det_compra); --}}
							<tr>
								<td>
									{!! Form::select('id_producto[]', ['0' => 'Seleccione Raza'] + \App\Raza::lists('raza', 'id')->toArray(), $det_compra->id_producto, ['class' => 'form-control', 'id' => 'id_producto'.$x]) !!}
								</td>
								<td>
									{!! Form::text('cantidad[]', $det_compra->cantidad, ['class' => 'form-control cantidad', 'id' => 'cantidad'.$x]) !!}
								</td>
								<td>
									{!! Form::text('precio[]', $det_compra->precio, ['class' => 'form-control precio', 'id' => 'precio'.$x]) !!}
								</td>
								<td>
									{!! Form::text('subtotal_prod[]', $det_compra->subtotal_prod, ['class' => 'form-control subtotal_prod', 'id' => 'subtotal_prod'.$x, 'readonly' => 'readonly']) !!}
								</td>
								<td>
									@if($x > 0)
										<button type="button" id="ibtnDel" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></button>
									@endif
								</td>
							</tr>
							{{--*/ $x++; /*--}}
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2"></td>
								<th style="text-align:right;padding-top:15px;">SubTotal:</th>
								<td>{!! Form::text('subtotal', null, ['class' => 'form-control','id' => 'subtotal', 'readonly' => 'readonly']) !!}</td>
							</tr>
							<tr>
								<td colspan="2"></td>
								<th style="text-align:right;padding-top:15px;">% Impuesto:</th>
								<td>{!! Form::text('impuesto', null, ['class' => 'form-control', 'id' => 'impuesto']) !!}</td>
							</tr>
							<tr>
								<td colspan="2"></td>
								<th style="text-align:right;padding-top:15px;">% Descuento:</th>
								<td>{!! Form::text('descuento', null, ['class' => 'form-control', 'id' => 'descuento']) !!}</td>
							</tr>
							<tr class="success">
								<td colspan="2"></td>
								<th style="text-align:right;padding-top:15px;">TOTAL ($):</th>
								<td>{!! Form::text('total', null, ['class' => 'form-control', 'id' => 'total', 'readonly' => 'readonly']) !!}</td>
							</tr>
							<tr>
								<td colspan="2"></td>
								<th style="text-align:right;padding-top:15px;">Tipo de Pago:</th>
								<td>
									{!! Form::select('id_tipo_pago', ['0' => 'Seleccione Tipo de Pago'] + \App\TipoPago::lists('tipo_pago', 'id')->toArray(), null, ['class' => 'form-control']) !!}
								</td>
							</tr>
						</tfoot>
					</table>					
				</div>
			</div>
		</div>

		<div class="form-group pull-right">
			<button type="submit" class="btn btn-success"><i class="fa fa-btn fa-money"></i>Comprar</button>
		</div>	
	{!! Form::close() !!}

@stop

@section('scripts')	
	<script src="{{ asset('assets/js/dynamic-table.js') }}"></script>
@append