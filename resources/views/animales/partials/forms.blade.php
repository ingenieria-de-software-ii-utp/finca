<div class="form-group">
    <label class="col-sm-4 control-label">Animal:</label>

    <div class="col-sm-6">
        {!! Form::text('animal', null, ['class' => 'form-control', 'placeholder' => 'Animal']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Tipo De Raza:</label>

    <div class="col-sm-6">
        {!! Form::select('id_raza', ['0' => 'Seleccionar Raza'] + \App\Raza::lists('raza', 'id')->toArray(), null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Descripción:</label>

    <div class="col-sm-6">
        {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'size' => '3x2', 'placeholder' => 'Descripción']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Estado:</label>

    <div class="col-sm-6">
         {!! Form::select('id_estado', ['0' => 'Seleccionar Estado'] + \App\TipoEstado::lists('tipo_estado', 'id')->toArray(), null, ['class' => 'form-control']) !!}
    </div>
</div>