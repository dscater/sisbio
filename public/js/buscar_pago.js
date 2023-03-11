
// Buscar por nombre
$('#buscador').on('change','select',function(){
  var padre_buscador = $('div#buscador');
  var anio = padre_buscador.find('select.anio').val();
  var mes = padre_buscador.find('select.mes').val();
  var token = $('#token').val();
  var url = $('#buscador').children('input.url_index').val();

  $.ajax({
    url:url,
    headers:{'X-CSRF-TOKEN':token},
    type:'GET',
    data:{'anio':anio,'mes':mes},
    dataType:'json',
    success:function(resp){
      $('.lista_pagos').html(resp);
    }
  });
});

// paginacion
$(document).on('click','#paginacion_pagosExtra .pagination a',function(e){
  e.preventDefault();

  var url = $('#buscador').children('input.url_index').val();

  var page = $(this).attr('href').split('page=')[1];

  var padre_buscador = $('div#buscador');
  var anio = padre_buscador.find('select.anio').val();
  var mes = padre_buscador.find('select.mes').val();

  $.ajax({
    url:url,
    data:{'anio':anio,'mes':mes,'page':page},
    type:'get',
    dataType:'json',
    before:function(){
      $('.lista_pagos').html('Cargando...');
    },
    success:function(resp){
      $('.lista_pagos').html(resp);
    }
  });

});
