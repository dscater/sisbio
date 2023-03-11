<div class="form-group col-md-4 col-md-offset-4">
  {{ Form::label('name','Nombre del área / unidad*:') }}
  {{ Form::text('name',null,['class'=>'form-control','required','readonly']) }}
</div>

<div class="form-group col-md-4 col-md-offset-4">
  {{ Form::label('description','Descripción:') }}
  {{ Form::textarea('description',$area->description?:'(Sin descripción)',['class'=>'form-control','rows'=>'3','readonly']) }}
</div>
