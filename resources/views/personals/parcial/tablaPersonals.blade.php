            <p>Numero de registros: {{$personals->total() }}. Página: {{$personals->currentPage()}} de {{$personals->lastPage()}}</p>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Apellidos y Nombre(s)</th>
                  <th>C.I.</th>
                  <th>Género</th>
                  <th>Celular</th>
                  <th>Email</th>
                  <th>Profesión</th>
                  <th>Foto</th>
                  <th colspan="6" class="iconos">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @if($personals->count() > 0)
                @foreach($personals as $personal)
                  <tr>
                    <td class="nombre_registro">{{ $personal->apep }} {{ $personal->apem }} {{ $personal->name }}</td>
                    <td>{{ $personal->ci }} {{ $personal->ci_exp }}</td>
                    <td>{{ $personal->genero }}</td>
                    <td>{{ $personal->cel }}</td>
                    <td>{{ $personal->email?:'(Sin email)' }}</td>
                    <td>{{ $personal->profesion }}</td>
                    <td><img src="{{ asset('imgs/'.$personal->foto) }}" alt="foto" width="90" height="90"></td>
                    <td class="reporte">
                      <a href="{{ route('personals.curriculum',$personal->id) }}" target="_blank">
                        <img class="reporte"  src="{{ asset('imgs/curriculum.png') }}" alt="" title="Curriculum">
                        <p>Curriculum</p>
                      </a>
                    </td>
                    <td class="reporte">
                      <a href="{{ route('personals.historia',$personal->id) }}" target="_blank">
                        <img class="reporte"  src="{{ asset('imgs/historia.png') }}" alt="" title="Historia">
                        <p>Historia</p>
                      </a>
                    </td>
                    <td width="2px" class="iconos"><a href="{{ route('personals.show',$personal->id) }}" title="Ver"><i class="fa fa-eye"></i></a></td>
                    <td width="2px" class="iconos"><a href="{{ route('personals.pdf',$personal->id) }}" target="_blank" title="Formulario de registro"><i class="fa fa-file-pdf"></i></a></td>
                    <td width="2px" class="iconos"><a href="{{ route('personals.edit',$personal->id) }}" title="Modificar"><i class="fa fa-edit"></i></a></td>
                    <td width="2px" class="iconos">
                      <a href="#" data-toggle="modal" data-target="#modal_eliminar" class="eliminar" title="Eliminar">
                        <i class="fa fa-trash-alt"></i>
                      </a>
                      <input type="text" value="{{ route('personals.destroy',$personal->id) }}" class="ruta_eliminar" hidden>
                    </td>
                  </tr>
                @endforeach
                @else
                <tr><td colspan="100px">No se encontro ningún registro</td></tr>
                @endif
              </tbody>
            </table>
            <div id="personal_lista">
              {{ $personals->render() }}
            </div>