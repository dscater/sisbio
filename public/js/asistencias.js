$(document).ready(function(){
  var contenedor_dia = $('#contenedor_dia');
  var contenedor_tarde = $('#contenedor_tarde');
  var estado = $('#estado');

  var now = new Date();
  var hora = now.getHours();
  var minutos = now.getMinutes();
  var segundo = now.getSeconds();

  hora = ( hora < 10 )? "0"+hora : hora;
  minutos = ( minutos < 10 )? "0"+minutos : minutos;
  segundo = ( segundo < 10 )? "0"+segundo : segundo;

  var ingreso_maniana = contenedor_dia.find('input[name="ingreso_maniana"]');
  var salida_maniana = contenedor_dia.find('input[name="salida_maniana"]');
  var ingreso_tarde = contenedor_tarde.find('input[name="ingreso_tarde"]');
  var salida_tarde = contenedor_tarde.find('input[name="salida_tarde"]');


  if(hora > 0 && hora < 12 ){
    $('#selector').find('select').val('dia');
    contenedor_dia.removeClass('oculto');
    estado.removeClass('oculto');
    ingreso_tarde.val('');
    salida_tarde.val('');
  }
  else{
    $('#selector').find('select').val('tarde');
    contenedor_tarde.removeClass('oculto');
    estado.removeClass('oculto');
    ingreso_maniana.val('');
    salida_maniana.val('');
  }

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
