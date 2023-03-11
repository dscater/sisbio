<div class="modal fade" id="filtro_contrato">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal">&times</button>
        <h4>ASISTENCIAS POR UNIDAD/ÁREA</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route'=>'reportes.contratos','method'=>'get','target'=>'_blank']) !!}
          <div class="form-group">
            {{ Form::label('contrato','Seleccione una opcíón*:') }}
            {{ Form::select('contrato',
              [
                'TODOS' => 'TODOS',
                'DE PLANTA' => 'DE PLANTA',
                'POR CONTRATO' => 'POR CONTRATO',
                'EVENTUAL' => 'EVENTUAL'
              ]
            ,null,['class'=>'form-control','required']) }}
          </div>
          <div class="form-group col-md-offset-5">
            {{ Form::submit('Aceptar',['class'=>'btn btn-primary']) }}
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
