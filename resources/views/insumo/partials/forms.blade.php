<div class="row">
	<div class="form-group col-sm-6">
		{!! Form::label('nombre', 'Nombre:') !!}
		{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Insumo']) !!}
	</div>
	
	<div class="form-group col-sm-6">
	{!! Form::label('descripcion', 'Descripcion') !!}
	{!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion', 'rows' => '3x2']) !!}
	</div>
	
	<div class="form-group col-sm-4">
		{!! Form::label('costo', 'Costo:')!!}
		{!! Form::text('costo', null, ['class' => 'form-control', 'placeholder' => 'Costo'])!!}
	</div>

	<div class="form-group col-sm-4">
		{!! Form::label('precio', 'Precio:')!!}
		{!! Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'Precio'])!!}
	</div>
	<div class="form-group col-sm-4">
		{!! Form::label('id_tipo', 'Tipo:') !!}
		{!! Form::select('id_tipo', array('0' => 'Seleccionar') + \App\TipoInsumo::lists('tipo', 'id')->toArray(), null, ['class' => 'form-control'])!!}
	</div>

	<div class="form-group col-sm-4">
		{!! Form::label('id_unidad', 'Unidad:') !!}
		{!! Form::select('id_unidad', array('0' => 'Seleccionar') + \App\Unidad::lists('unidad', 'id')->toArray(), null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group col-sm-4">
		{!! Form::label('expiracion', 'Fecha de Expiracion:')!!}
		{!! Form::text('expiracion', null, ['class' => 'form-control datepicker', 'placeholder' => 'MM/DD/AAAA']) !!}
	</div>
</div>