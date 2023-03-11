<div class="form-group col-md-4 col-md-offset-4">
  {{ Form::label('name','Nombre del cargo*:') }}
  {{ Form::text('name',null,['class'=>'form-control','required']) }}
</div>

<div class="form-group col-md-4 col-md-offset-4">
  {{ Form::label('description','Descripción:') }}
  {{ Form::textarea('description',null,['class'=>'form-control','rows'=>'3']) }}
</div>
