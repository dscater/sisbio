$(document).on('click','table tbody tr td a.eliminar',function(){
  var registro = $(this).parent().siblings('td.nombre_registro').text();

  var modal_eliminar = $('#modal_eliminar');
  var p = modal_eliminar.find('p.registro');
  var span = p.children('span.registro');
  span.text(registro);

  var form = $('#form_eliminar');
  var ruta = $(this).siblings('input.ruta_eliminar').val();

  form.prop('action',ruta);
  console.log(form.attr('action'));
});
