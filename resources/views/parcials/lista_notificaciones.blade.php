@if ($notificacions)
    @foreach ($notificacions as $value)
        <li data-id="{{ $value->id }}">
            <a href="{{ route('notificacions.index') }}">
                <span><i class="fa fa-clock"></i></span> {{ $value->notificacion->detalle }}
                <small>{{ $value->notificacion->created_at->diffForHumans() }}</small>
            </a>
        </li>
    @endforeach
@else
    <li>SIN NOTIFICACIONES</li>
@endif
