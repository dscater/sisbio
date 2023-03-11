$(document).ready(function(){
  var contenedor_dia = $('#contenedor_dia');
  var contenedor_tarde = $('#contenedor_tarde');
  var estado = $('#estado');

  $('#selector').on('change','select',function(){
    var seleccion = $(this).val();

    if(seleccion != "")
    {
      switch (seleccion) {
        case 'dia':
        contenedor_tarde.addClass('oculto');
        contenedor_dia.removeClass('oculto');
        estado.removeClass('oculto');
        ingreso_maniana.val(hora+':'+minutos);
        salida_maniana.val(hora+':'+minutos);

        ingreso_tarde.val('');
        salida_tarde.val('');
        console.log('dia');
          break;
          case 'tarde':
          contenedor_dia.addClass('oculto');
          contenedor_tarde.removeClass('oculto');
          estado.removeClass('oculto');
          ingreso_tarde.val(hora+':'+minutos);
          salida_tarde.val(hora+':'+minutos);

          ingreso_maniana.val('');
          salida_maniana.val('');
          console.log('tarde');
            break;
        default:

      }
    }
    else{
      contenedor_dia.addClass('oculto');
      contenedor_tarde.addClass('oculto');
      estado.addClass('oculto');
    }
  });
});
