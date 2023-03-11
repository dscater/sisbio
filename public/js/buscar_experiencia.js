
// Buscar por nombre
$('#buscador').on('keyup','input',function(){
  var padre_buscador = $('div#buscador');
  var empresa_exp = padre_buscador.find('input.empresa_exp').val();
  var token = $('#token').val();
  var url = $('#buscador').children('input.url_index').val();

  $.ajax({
    url:url,
    headers:{'X-CSRF-TOKEN':token},
    type:'GET',
    data:{'empresa_exp':empresa_exp},
    dataType:'json',
    success:function(resp){
      $('.lista_experiencias').html(resp);
    }
  });

  console.log(empresa_exp);
});

// paginacion
$(document).on('click','#paginacion_experiencia .pagination a',function(e){
  e.preventDefault();

  var url = $('#buscador').children('input.url_index').val();

  var page = $(this).attr('href').split('page=')[1];

  var padre_buscador = $('div#buscador');
  var empresa_exp = padre_buscador.find('input.empresa_exp').val();

  $.ajax({
    url:url,
    data:{'empresa_exp':empresa_exp,'page':page},
    type:'get',
    dataType:'json',
    before:function(){
      $('.lista_experiencias').html('Cargando...');
    },
    success:function(resp){
      $('.lista_experiencias').html(resp);
    }
  });

});
