@extends('layouts.app')

@section('title') Editar Proveedores @stop

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
					Editar Proveedores
				</div>
				<div class="panel-body">
					{!! Form::model($proveedor, ['route' => ['proveedor.update', $proveedor->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

						<div class="form-group">
						    <label class="col-sm-4 control-label">Nombre:</label>

						    <div class="col-sm-6">
						         {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
						    </div>
						</div>
						<div class="form-group">
						    <label class="col-sm-4 control-label">RUC:</label>

						    <div class="col-sm-6">
						         {!! Form::text('ruc', null, ['class' => 'form-control', 'placeholder' => 'RUC']) !!}
						    </div>
						</div>
						<div class="form-group">
						    <label class="col-sm-4 control-label">Proveedor:</label>

						    <div class="col-sm-6">
						         {!! Form::text('proveedor', null, ['class' => 'form-control', 'placeholder' => 'Proveedor']) !!}
						    </div>
						</div>
						<div class="form-group">
						    <label class="col-sm-4 control-label">Dirección:</label>

						    <div class="col-sm-6">
						         {!! Form::textarea('direccion', null, ['class' => 'form-control', 'placeholder' => 'Dirección', 'rows' => '3x1']) !!}
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