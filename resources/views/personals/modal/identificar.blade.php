<div class="modal fade" id="identificar_personal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div id="boton_cerrar_modal">
          <button class="close" data-dismiss="modal">&times;</button>
        </div>
        <h4 class="titulo">Personal:</h4>
      </div>
      <div class="modal-body">
        <div class="row" id="buscador_personal">
          <input type="text" class="url_index" value="{{ route('personals.identifica') }}" hidden>
          <div class="col-md-12">
            <h4><i class="fa fa-search"></i> Buscar personal:</h4>
          </div>
          <div class="col-md-4 col-xs-6">
            <input type="text" class="form-control nombre" placeholder="Nombre">
          </div>
          <div class="col-md-4 col-xs-6">
            <input type="text" class="form-control apellido" placeholder="Apellido paterno">
          </div>
        </div>
        <div class="lista_personals_identifica">

        </div>
      </div>
      <div class="modal-footer">
        <div id="boton_cerrar_modal2">
          <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>
