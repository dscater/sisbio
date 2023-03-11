<div class="modal fade" id="planilla">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal">&times</button>
        <h4>PLANILLAS DE SUELDOS</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=>'reportes.planillas','method'=>'get','target'=>'_blank']) !!}
          <div class="form-group">
            {{ Form::label('area','Unidad/área*:') }}
            {{ Form::select('area',$array_areas2,null,['class'=>'form-control','required']) }}
          </div>

          <div class="form-group">
            {{ Form::label('mes','Mes*:') }}
            {{ Form::select('mes',$array_mes2,null,['class'=>'form-control','required']) }}
          </div>

          <div class="form-group">
            {{ Form::label('anio','Año*:') }}
            {{ Form::select('anio',$array_anios2,$anio_actual,['class'=>'form-control','required']) }}
          </div>

          <div class="form-group col-md-offset-5">
            {{ Form::submit('Aceptar',['class'=>'btn btn-primary']) }}
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
