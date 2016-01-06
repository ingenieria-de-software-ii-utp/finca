@extends('layouts.app')

@section('title')
	FINCA - Crear Insumos
@stop

@section('content')
	<h2 class="page-header">Crear Insumos</h2>

	{{-- Muestra el mensaje si existe la variable msj_success --}}
	@if(Session::has('msj_success'))
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
		  {{ Session::get('msj_success') }}
		</div>
	@endif

	<a href="{{route('insumo.edit', 2) }}" class="btn btn-link">Editar</a>

	{!! Form::open(['route' => 'insumo.store', 'method' => 'POST', 'role' => 'form']) !!}	
		{!! Form::label('nombre', 'Nombre:') !!}
		{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Insumo']) !!}
		
		{!! Form::label('descripcion', 'Descripcion') !!}
		{!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion', 'rows' => '3x2']) !!}
		
		{!! Form::label('costo', 'Costo:')!!}
		{!! Form::text('costo', null, ['class' => 'form-control'])!!}
		
		{!! Form::label('precio', 'Precio:')!!}
		{!! Form::text('precio', null, ['class' => 'form-control'])!!}
		
		{!! Form::label('tipo', 'Tipo:') !!}
		{!! Form::select('tipo', array('0' => 'Seleccionar') + App\TipoInsumo::lists('tipo', 'id')->toArray(), null, ['class' => 'form-control'])!!}

		{!! Form::label('unidad', 'Unidad:') !!}
		{!! Form::select('unidad', array('0' => 'Seleccionar') + App\Unidad::lists('unidad', 'id')->toArray(), null, ['class' => 'form-control']) !!}

		{!! Form::label('expiracion', 'Fecha de Expiracion:')!!}
		{!! Form::text('expiracion', null, ['class' => 'form-control']) !!}

		{!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
	{!! Form::close() !!}
@stop