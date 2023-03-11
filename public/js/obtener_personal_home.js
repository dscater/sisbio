$(document).ready(function(){
});

var tipo ="";

// Obtener persona para la ventana modal
$('#opciones_personal_home').on('click','li a.obtener_personal',function(e){
  e.preventDefault();
  var padre_buscador_personal = $('div#buscador_personal');
  var nombre = padre_buscador_personal.find('input.nombre').val();
  var apellido = padre_buscador_personal.find('input.apellido').val();
  var token = $('#token').val();
  var url = $('#buscador_personal').children('input.url_index').val();

  tipo = $(this).attr('name');

  $.ajax({
    url:url,
    headers:{'X-CSRF-TOKEN':token},
    type:'GET',
    data:{'nombre':nombre,'apellido':apellido},
    dataType:'json',
    success:function(resp){
      $('#identificar_personal .lista_personals_identifica').html(resp);
      identificaTipo();
    }
  });

  $('#identificar_personal').modal('show');
});


// Buscar por nombre
$('#buscador_personal').on('keyup','input',function(){
  var padre_buscador_personal = $('div#buscador_personal');
  var nombre = padre_buscador_personal.find('input.nombre').val();
  var apellido = padre_buscador_personal.find('input.apellido').val();
  var token = $('#token').val();
  var url = $('#buscador_personal').children('input.url_index').val();

  $.ajax({
    url:url,
    headers:{'X-CSRF-TOKEN':token},
    type:'GET',
    data:{'nombre':nombre,'apellido':apellido},
    dataType:'json',
    success:function(resp){
      $('#identificar_personal .lista_personals_identifica').html(resp);
      identificaTipo();

    }
  });
});

// paginacion
$(document).on('click','#paginacion_modal .pagination li a',function(e){
  e.preventDefault();

  var url = $('#buscador_personal').children('input.url_index').val();

  var page = $(this).attr('href').split('page=')[1];

  var padre_buscador_personal = $('div#buscador_personal');
  var nombre = padre_buscador_personal.find('input.nombre').val();
  var apellido = padre_buscador_personal.find('input.apellido').val();
  var token = $('#token').val();

  $.ajax({
    url:url,
    headers:{'X-CSRF-TOKEN':token},
    data:{'page':page,'nombre':nombre,'apellido':apellido},
    type:'get',
    dataType:'json',
    before:function(){
      $('#identificar_personal .lista_personals_identifica').html('Cargando...');
    },
    success:function(resp){
      $('#identificar_personal .lista_personals_identifica').html(resp);
      identificaTipo();
    }
  });

});


function identificaTipo(){
        var tabla = $('#identificar_personal .lista_personals_identifica').children('table');
      var h4_titulo =$('#identificar_personal').find('h4.titulo');

      tabla.children('tbody tr td.acceso').each(function(){
        $(this).addClass('oculto');
      });

      switch (tipo) {
        case 'formacion':
          tabla.find('td[name="formacion"]').removeClass('oculto');
          h4_titulo.html('<i class="fa fa-user-graduate"></i> PERSONAL: FORMACIÓN ACADÉMICA');
          break;
          case 'asistencia':
            tabla.find('td[name="asistencia"]').removeClass('oculto');
            h4_titulo.html('<i class="fa fa-clock"></i> PERSONAL: ASISTENCIA');
            break;
            case 'especializacion':
              tabla.find('td[name="especializacion"]').removeClass('oculto');
              h4_titulo.html('<i class="fa fa-diagnoses"></i> PERSONAL: ESPECIALIZACIONES');
              break;
              case 'experiencia':
                tabla.find('td[name="experiencia"]').removeClass('oculto');
                h4_titulo.html('<i class="fa fa-file-alt"></i> PERSONAL: EXPERIENCIA LABORAL');
                break;
                case 'contrato':
                  tabla.find('td[name="contrato"]').removeClass('oculto');
                  h4_titulo.html('<i class="fa fa-list-alt"></i> PERSONAL: CONTRATOS');
                  break;
                  case 'pagos_extra':
                    tabla.find('td[name="pagos_extra"]').removeClass('oculto');
                    h4_titulo.html('<i class="fa fa-money-bill"></i> PERSONAL: PAGOS EXTRA');
                    break;
                    case 'descuento':
                      tabla.find('td[name="descuento"]').removeClass('oculto');
                      h4_titulo.html('<i class="fa fa-money-bill"></i> PERSONAL: DESCUENTOS');
                      break;
                      case 'pago':
                        tabla.find('td[name="pago"]').removeClass('oculto');
                        h4_titulo.html('<i class="fa fa-hand-holding-usd"></i> PERSONAL: PAGOS');
                        break;
        default:

      }
}