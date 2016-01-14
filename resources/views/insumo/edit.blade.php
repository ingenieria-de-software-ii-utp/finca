@extends('layouts.app')

@section('title')
	Editar Insumos
@stop

@section('content')
	
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
	
	<div class="panel panel-default">
		<div class="panel-heading">
			Editar Insumos
		</div>
		<div class="panel-body">
			{!! Form::model($insumo, ['route' => array('insumo.update', $insumo->id), 'method' => 'PATCH', 'role' => 'form']) !!}	
				
				@include('insumo.partials.forms')

				<div class="form-group pull-right">
					<button type="submit" class="btn btn-success"><i class="fa fa-btn fa-save"></i>Editar</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@stop