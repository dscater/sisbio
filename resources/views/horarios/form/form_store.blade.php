<div id="contenedor_hora">
  <h3>Mañana</h3>
  <div class="maniana">
    <label>Ingreso: </label>
    {{ Form::time('ingreso_maniana',null,['required']) }}
    <label>Salida: </label>
    {{ Form::time('salida_maniana',null,['required']) }}
  </div>
  <h3>Tarde</h3>
  <div class="tarde">
    <label>Ingreso: </label>
    {{ Form::time('ingreso_tarde',null,['required']) }}
    <label>Salida: </label>
    {{ Form::time('salida_tarde',null,['required']) }}
  </div>
  <div class="observacion">
    <label>Observaciones: </label>
    {{ Form::text('observacion',null,['class'=>'form-control']) }}
  </div>
</div>
