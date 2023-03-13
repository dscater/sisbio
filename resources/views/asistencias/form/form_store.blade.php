<div id="contenedor_asistencia">
    <div id="selector">
        <div class="form-group col-md-6">
            {{ Form::label('select_asistencia', 'Seleccione horario:') }}
            {{ Form::select(
                'select_asistencia',
                [
                    '' => '- Seleccione -',
                    'dia' => 'Asistencia mañana',
                    'tarde' => 'Asistencia tarde',
                ],
                null,
                ['class' => 'form-control', 'required'],
            ) }}
        </div>
    </div>
    <div id="fecha">
        @if (isset($asistencia->fecha))
            <div class="form-group">
                {{ Form::label('fecha', 'Fecha*:') }}
                {{ Form::date('fecha', null, ['class' => 'form-control', 'required']) }}
            </div>
        @else
            <div class="form-group col-md-4">
                {{ Form::label('fecha', 'Fecha*:') }}
                {{ Form::date('fecha', date('Y-m-d'), ['class' => 'form-control', 'required']) }}
            </div>
        @endif
    </div>
    <div id="contenedor_dia" class="oculto">
        <span><i class="fa fa-sun"></i></span>
        <h2>Asistencia mañana</h2>
        <div id="manania">
            <div class="form-group col-md-4">
                {{ Form::label('ingreso_maniana', 'Ingreso*:') }}
                {{ Form::time('ingreso_maniana', date('G') < '10' ? date('0G:i') : date('G:i'), ['class' => 'form-control']) }}
            </div>

            <div class="form-group col-md-4">
                {{ Form::label('salida_maniana', 'Salida*:') }}
                {{ Form::time('salida_maniana', date('G') < '10' ? date('0G:i') : date('G:i'), ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
    <div id="contenedor_tarde" class="oculto">
        <span><i class="fa fa-sun"></i></span>
        <h2>Asistencia tarde</h2>
        <div id="tarde">
            <div class="form-group col-md-4">
                {{ Form::label('ingreso_tarde', 'Ingreso tarde*:') }}
                {{ Form::time('ingreso_tarde', date('G:i'), ['class' => 'form-control']) }}
            </div>

            <div class="form-group col-md-4">
                {{ Form::label('salida_tarde', 'Salida tarde*:') }}
                {{ Form::time('salida_tarde', date('G:i'), ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
    <div id="estado" class="oculto">
        <div class="form-group col-md-4">
            {{ Form::label('estado', 'Estado:') }}
            {{ Form::text('estado', 'ASISTIÓ', ['class' => 'form-control', 'readonly']) }}
        </div>
    </div>
</div>

<!-- <div class="form-group col-md-4">
    {{ Form::label('estado', 'Parametro de asistencia*:') }}
    {{ Form::select(
        'estado',
        [
            '' => '- Seleccione una opción -',
            'ASISTIÓ' => 'Asistió',
            'FALTA' => 'Falta',
            'PERMISO' => 'Permiso',
            'VACACIONES' => 'Vaciones',
        ],
        null,
        ['class' => 'form-control'],
    ) }}
  </div> -->
