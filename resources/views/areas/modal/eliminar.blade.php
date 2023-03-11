<div class="modal fade" id="modal_eliminar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal">&times;</button>
        <h4>Eliminar Área / Unidad</h4>
      </div>
      <div class="modal-body">
        <p class="registro">Eliminar el área / unidad: <span class="registro"></strong></p>
        <p>¿Estás seguro? Esta acción no se podra deshacer.</p>
      </div>
      <div class="modal-footer">
        <form action="" method="POST" id="form_eliminar">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
          <input type="submit" value="Eliminar" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
