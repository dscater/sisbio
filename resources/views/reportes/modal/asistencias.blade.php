<div class="modal fade" id="asistencias">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal">&times</button>
        <h4>ASISTENCIAS POR UNIDAD/ÁREA</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=>'reportes.asistencias','method'=>'get','target'=>'_blank']) !!}
          <div class="form-group">
            {{ Form::label('area','Unidad/área*:') }}
            {{ Form::select('area',$array_areas,null,['class'=>'form-control','required']) }}
          </div>

          <div class="form-group">
            {{ Form::label('mes','Mes*:') }}
            {{ Form::select('mes',$array_mes,null,['class'=>'form-control','required']) }}
          </div>

          <div class="form-group">
            {{ Form::label('anio','Año*:') }}
            {{ Form::select('anio',$array_anios,$anio_actual,['class'=>'form-control','required']) }}
          </div>

          <div class="form-group col-md-offset-5">
            {{ Form::submit('Aceptar',['class'=>'btn btn-primary']) }}
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
