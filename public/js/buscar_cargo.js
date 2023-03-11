
// Buscar por nombre
$('#buscador').on('keyup','input',function(){
  var padre_buscador = $('div#buscador');
  var cargo = padre_buscador.find('input.cargo').val();
  var token = $('#token').val();
  var url = $('#buscador').children('input.url_index').val();

  $.ajax({
    url:url,
    headers:{'X-CSRF-TOKEN':token},
    type:'GET',
    data:{'cargo':cargo},
    dataType:'json',
    success:function(resp){
      $('.lista_cargos').html(resp);
    }
  });
});

// paginacion
$(document).on('click','#paginacion_cargos .pagination a',function(e){
  e.preventDefault();

  var url = $('#buscador').children('input.url_index').val();

  var page = $(this).attr('href').split('page=')[1];

  var padre_buscador = $('div#buscador');
  var cargo = padre_buscador.find('input.cargo').val();

  $.ajax({
    url:url,
    data:{'cargo':cargo,'page':page},
    type:'get',
    dataType:'json',
    before:function(){
      $('.lista_cargos').html('Cargando...');
    },
    success:function(resp){
      $('.lista_cargos').html(resp);
    }
  });

});
