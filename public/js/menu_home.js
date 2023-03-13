
$(document).ready(function () {

  reloj();

  setInterval(reloj, 1000);

  nueva_asistencia();

  setInterval(nueva_asistencia, 1000);
});

$('#menu_home').on('click', 'ul li.contenedor-sub-menu', function (e) {
  e.preventDefault();
  $(this).toggleClass('abierto');
  var ul = $(this).children('ul.sub-menu');
  ul.toggleClass('oculto');
});

$('ul.sub-menu').click(function (e) {
  e.stopPropagation();
});

function nueva_asistencia() {
  var url = $('#url_asistencias_nuevas').val();
  var token = $('#token').val();
  $.ajax({
    url: url,
    headers: { 'X-CSRF-TOKEN': token },
    type: 'GET',
    data: { 'dato': 'dato', 'ultimo_id': 1 },
    success: function (resp) {
      $('.contenedor_asistencias').html(resp.html);
    }
  });
}

function reloj() {
  var now = new Date();
  var hora = now.getHours();
  var minuto = now.getMinutes();
  var segundo = now.getSeconds();

  hora = (hora < 10) ? "0" + hora : hora;
  minuto = (minuto < 10) ? "0" + minuto : minuto;
  segundo = (segundo < 10) ? "0" + segundo : segundo;

  var hora_reloj = hora + ' : ' + minuto + ' : ' + segundo;
  $('#hora').html(hora_reloj);
}
