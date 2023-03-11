
// Buscar por nombre
$('#buscador').on('change','input',function(){
  var padre_buscador = $('div#buscador');
  var fech_ingreso = padre_buscador.find('input.fech_ingreso').val();
  var fech_retiro = padre_buscador.find('input.fech_retiro').val();
  var token = $('#token').val();
  var url = $('#buscador').children('input.url_index').val();

  $.ajax({
    url:url,
    headers:{'X-CSRF-TOKEN':token},
    type:'GET',
    data:{'fech_ingreso':fech_ingreso,'fech_retiro':fech_retiro},
    dataType:'json',
    success:function(resp){
      $('.lista_contratos').html(resp);
    }
  });
});

// paginacion
$(document).on('click','#paginacion_contrato .pagination a',function(e){
  e.preventDefault();

  var url = $('#buscador').children('input.url_index').val();

  var page = $(this).attr('href').split('page=')[1];

  var padre_buscador = $('div#buscador');
  var fech_ingreso = padre_buscador.find('input.fech_ingreso').val();
  var fech_retiro = padre_buscador.find('input.fech_retiro').val();

  $.ajax({
    url:url,
    data:{'fech_ingreso':fech_ingreso,'fech_retiro':fech_retiro,'page':page},
    type:'get',
    dataType:'json',
    before:function(){
      $('.lista_contratos').html('Cargando...');
    },
    success:function(resp){
      $('.lista_contratos').html(resp);
    }
  });

});
