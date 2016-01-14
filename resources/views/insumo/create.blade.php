@extends('layouts.app')

@section('title')
	Crear Insumos
@stop

@section('content')
	
	{{-- Muestra el mensaje si existe la variable msj_success --}}
	@if(Session::has('msj_success'))
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
		  <strong> {{ Session::get('msj_success') }} </strong>
		</div>
	@endif

	@if(count($errors) > 0)
		<div class="alert alert-danger">
			Por favor corriga los siguientes errores:
			@foreach($errors->all() as $error)
			<ul>
				<li>{{ $error }}</li>
			</ul>
			@endforeach
		</div>
	@endif

	<div class="panel panel-info">
		<div class="panel-heading">
			<i class="fa fa-btn fa-filter"></i>Filtrar Insumos
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table id="tabla-insumos">
					<thead>
						<tr>
							<th data-field="num">#</th>
							<th data-field="name">Nombre</th>
							<th data-field="cost">Costo</th>
							<th data-field="price">Precio</th>
							<th data-field="exp">Expiración</th>
							<th data-field="act">Acción</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
	</br>
	<div class="panel panel-default">
		<div class="panel-heading">
			Crear Insumos
		</div>
		<div class="panel-body">
			{!! Form::open(['route' => 'insumo.store', 'method' => 'POST']) !!}
				
				@include('insumo.partials.forms')
		 
				<div class="form-group pull-right">
					<button type="submit" class="btn btn-success"><i class="fa fa-btn fa-save"></i>Guardar</button>
				</div>			

			{!! Form::close() !!}
		</div>
	</div>
@stop