<div class="form-group col-md-4 col-md-offset-4">
  {{ Form::label('name','Nombre del cargo*:') }}
  {{ Form::text('name',null,['class'=>'form-control','required','readonly']) }}
</div>

<div class="form-group col-md-4 col-md-offset-4">
  {{ Form::label('description','Descripción:') }}
  {{ Form::textarea('description',$cargo->description?:'(Sin descripción)',['class'=>'form-control','rows'=>'3','readonly']) }}
</div>
