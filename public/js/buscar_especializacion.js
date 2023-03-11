
// Buscar por nombre
$('#buscador').on('keyup','input',function(){
  var padre_buscador = $('div#buscador');
  var institucion = padre_buscador.find('input.institucion').val();
  var token = $('#token').val();
  var url = $('#buscador').children('input.url_index').val();

  $.ajax({
    url:url,
    headers:{'X-CSRF-TOKEN':token},
    type:'GET',
    data:{'institucion':institucion},
    dataType:'json',
    success:function(resp){
      $('.lista_especializacions').html(resp);
    }
  });
});

// paginacion
$(document).on('click','#paginacion_especializacion .pagination a',function(e){
  e.preventDefault();

  var url = $('#buscador').children('input.url_index').val();

  var page = $(this).attr('href').split('page=')[1];

  var padre_buscador = $('div#buscador');
  var institucion = padre_buscador.find('input.institucion').val();

  $.ajax({
    url:url,
    data:{'institucion':institucion,'page':page},
    type:'get',
    dataType:'json',
    before:function(){
      $('.lista_especializacions').html('Cargando...');
    },
    success:function(resp){
      $('.lista_especializacions').html(resp);
    }
  });

});
