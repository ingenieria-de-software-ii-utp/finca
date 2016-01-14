<div class="form-group">
    <label class="col-sm-4 control-label">Raza:</label>

    <div class="col-sm-6">
         {!! Form::text('raza', null, ['class' => 'form-control', 'placeholder' => 'Raza']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Tipo de Raza:</label>

    <div class="col-sm-6">
        {!! Form::select('id_tipo_raza', array('0' => 'Seleccione el Tipo de Raza') + \App\TipoRaza::lists('tipo_raza', 'id')->toArray(), null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">Descripción:</label>

    <div class="col-sm-6">
         {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción', 'rows' => '3x1']) !!}
    </div>
</div>