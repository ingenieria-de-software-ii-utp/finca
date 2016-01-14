@extends('layouts.app')

@section('title') Editar Tipos de Razas @stop

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
	
	<div class="row">
        <div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Agregar Tipos de Razas
				</div>
				<div class="panel-body">
					{!! Form::model($tipoRaza, ['route' => ['tipo-raza.update', $tipoRaza->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

						 <div class="form-group">
						    <label class="col-sm-4 control-label">Tipo de Raza:</label>

						    <div class="col-sm-6">
						        {!! Form::text('tipo_raza', null, ['class' => 'form-control', 'placeholder' => 'Tipo de Raza']) !!}
						    </div>
						</div>

						<div class="form-group">
							<div class="col-sm-6 col-sm-offset-4">
								<button type="submit" class="btn btn-success"><i class="fa fa-btn fa-edit"></i>Editar</button>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@stop