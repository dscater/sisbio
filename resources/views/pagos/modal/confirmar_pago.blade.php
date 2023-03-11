<div class="modal fade" id="modal_confirma">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button data-dismiss="modal" class="close">&times;</button>
        <h3>Confirmar pago</h3>
      </div>
      <div class="modal-body">
        @include('pagos.form.form_confirma_pago')
      </div>
      <div class="modal-footer">
        {{ Form::submit('Confirmar pago',['class'=>'btn btn-success']) }}
        <button data-dismiss="modal" class="btn btn-default">Cancelar</button>
      </div>
    </div>
  </div>
</div>
