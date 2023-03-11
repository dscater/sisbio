$(document).ready(function(){
  console.log('listo');
    $('.mensaje_error').hide();
});

var sw = 0;
// Valores tasas
var valor_afps = 0.00;
var valor_comision_afp = 0.00;
var valor_fondo_solidario = 0.00;
var valor_riesgo_comun = 0.00;

// CLICK EN BOTON REGISTRAR PAGO

$('.panel-body').on('click','a#registrar_pago',function(){
// url
  var url = $('#url_datos').val();
  var token = $('#token').val();

  var select_mes = $('#select_mes').val();
  var select_anio = $('#select_anio').val();
  var salario = parseFloat($('#salario').val());

// INPUTS
  var afps = $('#afps');
  var comision_afp = $('#comision_afp');
  var fondo_solidario = $('#fondo_solidario');
  var riesgo_comun = $('#riesgo_comun');

  var dias_trabajados = $('#dias_trabajados');
  var horas_extra = $('#horas_extra');
  var pagos_otros = $('#pagos_otros');
  var anticipos = $('#anticipos');
  var descuentos_otros = $('#descuentos_otros');
  var total_pagos = $('#total_pagos');
  var total_descuentos = $('#total_descuentos');
  var total_total = $('#total_total');

    // VALORES TASAS
  if(sw == 0)
  {
    valor_afps = parseFloat(afps.val());
    valor_comision_afp = parseFloat(comision_afp.val());
    valor_fondo_solidario = parseFloat(fondo_solidario.val());
    valor_riesgo_comun = parseFloat(riesgo_comun.val());
    sw = 1;
  }
  // CALCULANDO VALORES TASAS
  afps.val((salario*valor_afps).toFixed(2));
  comision_afp.val((salario*valor_comision_afp).toFixed(2));
  fondo_solidario.val((salario*valor_fondo_solidario).toFixed(2));
  riesgo_comun.val((salario*valor_riesgo_comun).toFixed(2));

  if(select_mes != "" && select_anio != "")
  {
    $.ajax({
      url:url,
      headers:{'X-CSRF-TOKEN':token},
      data:{'mes':select_mes,'anio':select_anio},
      type:'GET',
      dataType:'json',
      success:function(datos){
        // dias_trabajados.val(datos.dias_trabajados);//ASIGNA LOS DÍAS TRABAJADOS EN UN MES (COMENTADO SE DEJARA POR DEFECTO 30)
        dias_trabajados.val('30');
        horas_extra.val(datos.monto_pago_extra_horas.toFixed(2));
        pagos_otros.val(datos.monto_pago_extra_otros.toFixed(2));
        anticipos.val(datos.monto_descuento_anticipo.toFixed(2));
        descuentos_otros.val(datos.monto_descuento_otro.toFixed(2));

        // DETERMINAR EL TIPO DE CONTRATO
        console.log(datos.tipo_contrato);
        if(datos.tipo_contrato == 'POR CONTRATO' || datos.tipo_contrato == 'EVENTUAL')
        {
          afps.val('0.00');
          comision_afp.val('0.00');
          fondo_solidario.val('0.00');
          riesgo_comun.val('0.00');
        }

        total_pagos.val((salario+parseFloat(horas_extra.val())+parseFloat(pagos_otros.val())).toFixed(2));
        total_descuentos.val((parseFloat(afps.val())+parseFloat(comision_afp.val())+parseFloat(fondo_solidario.val())+parseFloat(riesgo_comun.val())+parseFloat(anticipos.val())+parseFloat(descuentos_otros.val())).toFixed(2));

        total_total.val((parseFloat(total_pagos.val()) - parseFloat(total_descuentos.val())).toFixed(2));
        $('#modal_confirma').modal('show');
      },
    });
        // $('#modal_confirma').modal('show');
  }
  else{
    $('.mensaje_error').show();
    $('.mensaje_error').html('DEBES SELECCIONAR EL MES Y EL AÑO');
    setTimeout(function(){
      $('.mensaje_error').hide();
    },2500);
  }

  // console.log(select_anio);
});
