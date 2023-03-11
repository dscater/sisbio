
// Buscar por nombre
$('#buscador').on('keyup','input',function(){
  var padre_buscador = $('div#buscador');
  var nombre = padre_buscador.find('input.nombre').val();
  var apellido = padre_buscador.find('input.apellido').val();
  var token = $('#token').val();
  var url = $('#buscador').children('input.url_index').val();

  $.ajax({
    url:url,
    headers:{'X-CSRF-TOKEN':token},
    type:'GET',
    data:{'nombre':nombre,'apellido':apellido},
    dataType:'json',
    success:function(resp){
      $('.lista_personals').html(resp);
    }
  });
});

// paginacion
$(document).on('click','#personal_lista .pagination a',function(e){
  e.preventDefault();

  var url = $('#buscador').children('input.url_index').val();

  var page = $(this).attr('href').split('page=')[1];

  var padre_buscador = $('div#buscador');
  var nombre = padre_buscador.find('input.nombre').val();
  var apellido = padre_buscador.find('input.apellido').val();

  $.ajax({
    url:url,
    data:{'nombre':nombre,'apellido':apellido,'page':page},
    type:'get',
    dataType:'json',
    before:function(){
      $('.lista_personals').html('Cargando...');
    },
    success:function(resp){
      $('.lista_personals').html(resp);
    }
  });

  console.log(url);

});
