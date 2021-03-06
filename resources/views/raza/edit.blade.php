@extends('layouts.app')

@section('title') Editar Razas @stop

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
					Editar Razas
				</div>
				<div class="panel-body">
					{!! Form::model($raza, ['route' => ['raza.update', $raza->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) !!}

						@include('raza.partials.forms')
						
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