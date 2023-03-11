<div class="modal fade" id="selec_asis">
	<div class="modal-dialog">
	    <div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4 class="titulo" style="color:#000000;">Cargar asistencia</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['route'=>'asistencias.subir_asistencia','method'=>'POST','files'=>'true']) !!}
				<div class="form-group">
					<label style="color:#000000;">Seleccione archivo (.xls)*</label>
					<input type="file" name="asistencia" id="asistencia" required>
				</div>
			</div>
			<div class="modal-footer">
					{{ Form::submit('Cargar',['class'=>'btn btn-primary']) }}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>