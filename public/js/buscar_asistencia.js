
// Buscar por nombre
$('#buscador').on('change','input',function(){
  var padre_buscador = $('div#buscador');
  var fecha = padre_buscador.find('input.fecha').val();
  var token = $('#token').val();
  var url = $('#buscador').children('input.url_index').val();

  $.ajax({
    url:url,
    headers:{'X-CSRF-TOKEN':token},
    type:'GET',
    data:{'fecha':fecha},
    dataType:'json',
    success:function(resp){
      $('.lista_asistencias').html(resp);
    }
  });
});

// paginacion
$(document).on('click','#paginacion_asistencias .pagination a',function(e){
  e.preventDefault();

  var url = $('#buscador').children('input.url_index').val();

  var page = $(this).attr('href').split('page=')[1];

  var padre_buscador = $('div#buscador');
  var fecha = padre_buscador.find('input.fecha').val();

  $.ajax({
    url:url,
    data:{'fecha':fecha,'page':page},
    type:'get',
    dataType:'json',
    before:function(){
      $('.lista_asistencias').html('Cargando...');
    },
    success:function(resp){
      $('.lista_asistencias').html(resp);
    }
  });

});
