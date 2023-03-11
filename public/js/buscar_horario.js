
// Buscar por nombre
$('#buscador').on('keyup','input',function(){
  var padre_buscador = $('div#buscador');
  var area = padre_buscador.find('input.area').val();
  var token = $('#token').val();
  var url = $('#buscador').children('input.url_index').val();

  $.ajax({
    url:url,
    headers:{'X-CSRF-TOKEN':token},
    type:'GET',
    data:{'area':area},
    dataType:'json',
    success:function(resp){
      $('.lista_horarios').html(resp);
    }
  });
});

// paginacion
$(document).on('click','#paginacion_horario .pagination a',function(e){
  e.preventDefault();

  var url = $('#buscador').children('input.url_index').val();

  var page = $(this).attr('href').split('page=')[1];

  var padre_buscador = $('div#buscador');
  var area = padre_buscador.find('input.area').val();

  $.ajax({
    url:url,
    data:{'area':area,'page':page},
    type:'get',
    dataType:'json',
    before:function(){
      $('.lista_horarios').html('Cargando...');
    },
    success:function(resp){
      $('.lista_horarios').html(resp);
    }
  });

});
