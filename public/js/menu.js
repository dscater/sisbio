$(document).ready(function(){

});

var alto_menu = 0;

$('.menu_user').on('click','li > a',function(){
  $(this).siblings('ul').toggleClass('oculto');
});

$('#menu').on('click','ul li.contenedor-sub-menu',function(e){
  e.preventDefault();

  $(this).toggleClass('abierto');
  var ul = $(this).children('ul.sub-menu');
  ul.toggleClass('oculto');

  alto_menu = $('#menu ul li.contenedor-sub-menu.abierto').parents('#menu').height();

  console.log(alto_menu);


});

$('#fondo_menu #contenedor_menu').click(function(e){
  e.stopPropagation();
});

$('#fondo_menu').click(function(){
  $('#contenedor_menu').toggleClass('menu_abierto');

  $('.boton-toggle2').toggleClass('abierto');
  $('.boton-toggle').toggleClass('abierto');

  $('#fondo_menu').toggleClass('activo');
  $('body').toggleClass('menu_activo');

  var span1 = $('.boton-toggle2').children('span.span-1');
  var span2 = $('.boton-toggle2').children('span.span-2');
  var span3 = $('.boton-toggle2').children('span.span-3');

  span1.toggleClass('abierto');
  span2.toggleClass('abierto');
  span3.toggleClass('abierto');
});

// $('#menu ul.lista-menu').mouseenter(function(){
//   $('#contenedor_menu').addClass('activar_hover');
// });

// $('#contenedor_menu').mouseleave(function(){
//   $(this).removeClass('activar_hover');
// });

$('ul.sub-menu').click(function(e){
  e.stopPropagation();
});

$('.boton-toggle').click(function(){
  $('#contenedor_menu').toggleClass('menu_abierto');

  $(this).toggleClass('abierto');

  $('#fondo_menu').toggleClass('activo');
  $('body').toggleClass('menu_activo');

  var span1 = $('.boton-toggle2').children('span.span-1');
  var span2 = $('.boton-toggle2').children('span.span-2');
  var span3 = $('.boton-toggle2').children('span.span-3');

  span1.toggleClass('abierto');
  span2.toggleClass('abierto');
  span3.toggleClass('abierto');

});

$('.boton-toggle2').click(function(){
  $('#contenedor_menu').toggleClass('menu_abierto');

  $(this).toggleClass('abierto');
  $('.boton-toggle').toggleClass('abierto');

  $('#fondo_menu').toggleClass('activo');
  $('body').toggleClass('menu_activo');

  var span1 = $(this).children('span.span-1');
  var span2 = $(this).children('span.span-2');
  var span3 = $(this).children('span.span-3');

  span1.toggleClass('abierto');
  span2.toggleClass('abierto');
  span3.toggleClass('abierto');

});
