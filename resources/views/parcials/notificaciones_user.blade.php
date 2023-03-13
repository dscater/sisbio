<a href="#" onclick="event.preventDefault();">
    <span class="notificacion"><i class="fa fa-bell"></i>
        <span class="badge badge-black text-xs {{ (int) $no_vistos <= 0 ? 'oculto' : '' }}"
            id="txt_no_vistos">{{ $no_vistos }}</span>
    </span>
</a>
<ul class="sub-menu-user oculto">
    @include('parcials.lista_notificaciones')
</ul>
