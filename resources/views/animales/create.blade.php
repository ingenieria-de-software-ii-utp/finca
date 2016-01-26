@extends('layouts.app')

@section('title') Registrar Animal @stop

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
	{{-- Muestra el mensaje si existe la variable msj_success --}}
	@if(Session::has('msj_success'))
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
		  <strong> {{ Session::get('msj_success') }} </strong>
		</div>
	@endif

	<div class="panel panel-info">
		<div class="panel-heading">
			<i class="fa fa-btn fa-filter"></i>Filtrar Animales
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table id="tabla-animal">
					<thead>
						<tr>
							<th data-field="num">#</th>
							<th data-field="animal">Animal</th>
							<th data-field="act">Acción</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
        <div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Agregar Animales
				</div>
				<div class="panel-body">
					{!! Form::open(['route' => 'animales.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

						@include('animales.partials.forms')

						<div class="form-group">
							<div class="col-sm-6 col-sm-offset-4">
								<button type="submit" class="btn btn-success"><i class="fa fa-btn fa-plus"></i>Agregar</button>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop