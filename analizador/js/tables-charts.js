
var dataIndicador = [];

var numeroEstudiantes = 0;

$(document).ready(function() {

  var cIndicador = document.getElementById("chart-indicador").getContext("2d");
  var cParticipacion = document.getElementById("chart-participacion").getContext("2d");
  var cHabilidades = document.getElementById("chart-habilidades").getContext("2d");

  numeroEstudiantes = $('.indi-name').length;

  var nombres = [];
  var indicadoresC = [];
  var indicadoresM = [];
  var indicadoresD = [];
  var indicadoresG = [];

  for (var i = 0; i < numeroEstudiantes; i++) {

    var selName = '.indi-name:eq('+i+')';
    nombres.push( $(selName).text() );
    var selC = '.indi-c:eq('+i+')';
    indicadoresC.push( parseFloat( $(selC).text() ) );
    var selM = '.indi-m:eq('+i+')';
    indicadoresM.push( parseFloat( $(selM).text() ) );
    var selD = '.indi-d:eq('+i+')';
    indicadoresD.push( parseFloat( $(selD).text() ) );
    var selG = '.indi-g:eq('+i+')';
    indicadoresG.push( parseFloat( $(selG).text() ) );


  }

  var participacionesC = [];
  var participacionesM = [];
  var participacionesD = [];
  var participacionesG = [];

  for (var i = 0; i < numeroEstudiantes; i++) {
    // var selName = '.indi-name:eq('+i+')';
    // nombres.push( $(selName).text() );
    var selC = '.parti-c:eq('+i+')';
    participacionesC.push( parseFloat( $(selC).text() ) );
    var selM = '.parti-m:eq('+i+')';
    participacionesM.push( parseFloat( $(selM).text() ) );
    var selD = '.parti-d:eq('+i+')';
    participacionesD.push( parseFloat( $(selD).text() ) );
    var selG = '.parti-g:eq('+i+')';
    participacionesG.push( parseFloat( $(selG).text() ) );
  }

  var habilidadesC = [];
  var habilidadesM = [];
  var habilidadesD = [];
  var habilidadesG = [];

  for (var i = 0; i < numeroEstudiantes; i++) {
    // var selName = '.indi-name:eq('+i+')';
    // nombres.push( $(selName).text() );
    var selC = '.habil-c:eq('+i+')';
    habilidadesC.push( parseFloat( $(selC).text() ) );
    var selM = '.habil-m:eq('+i+')';
    habilidadesM.push( parseFloat( $(selM).text() ) );
    var selD = '.habil-d:eq('+i+')';
    habilidadesD.push( parseFloat( $(selD).text() ) );
    var selG = '.habil-g:eq('+i+')';
    habilidadesG.push( parseFloat( $(selG).text() ) );
  }

  var datosIndicador = {
    labels: nombres,
    datasets:[
      {
        label: "C",
        fillColor: "rgba(57, 3, 255,0.5)",
        strokeColor: "rgba(57, 3, 255,0.8)",
        highlightFill: "rgba(57, 3, 255,0.75)",
        highlightStroke: "rgba(57, 3, 255,1)",
        data:indicadoresC
      },
      {
        label: "M",
        fillColor: "rgba(57, 84, 255,0.5)",
        strokeColor: "rgba(57, 84, 255,0.8)",
        highlightFill: "rgba(57, 84, 255,0.75)",
        highlightStroke: "rgba(57, 84, 255,1)",
        data:indicadoresM
      },
      {
        label: "D",
        fillColor: "rgba(57, 156, 255, 0.5)",
        strokeColor: "rgba(57, 156, 255, 0.8)",
        highlightFill: "rgba(57, 156, 255, 0.75)",
        highlightStroke: "rgba(57, 156, 255, 1)",
        data:indicadoresD
      },
      {
        label: "G",
        fillColor: "rgba(135, 181, 255,0.5)",
        strokeColor: "rgba(135, 181, 255,0.8)",
        highlightFill: "rgba(135, 181, 255,0.75)",
        highlightStroke: "rgba(135, 181, 255,1)",
        data:indicadoresG
      }
    ]
  };

  var datosParticipacion = {
    labels: nombres,
    datasets:[
    {
      label: "CE",
      fillColor: "rgba(57, 3, 255,0.5)",
      strokeColor: "rgba(57, 3, 255,0.8)",
      highlightFill: "rgba(57, 3, 255,0.75)",
      highlightStroke: "rgba(57, 3, 255,1)",
      data:participacionesC
    },
    {
      label: "ME",
      fillColor: "rgba(57, 84, 255,0.5)",
      strokeColor: "rgba(57, 84, 255,0.8)",
      highlightFill: "rgba(57, 84, 255,0.75)",
      highlightStroke: "rgba(57, 84, 255,1)",
      data:participacionesM
    },
    {
      label: "DE",
      fillColor: "rgba(57, 156, 255, 0.5)",
      strokeColor: "rgba(57, 156, 255, 0.8)",
      highlightFill: "rgba(57, 156, 255, 0.75)",
      highlightStroke: "rgba(57, 156, 255, 1)",
      data:participacionesD
    },
    {
      label: "GE",
      fillColor: "rgba(135, 181, 255,0.5)",
      strokeColor: "rgba(135, 181, 255,0.8)",
      highlightFill: "rgba(135, 181, 255,0.75)",
      highlightStroke: "rgba(135, 181, 255,1)",
      data:participacionesG
    }
    ]
  };

  var datosHabilidades = {
    labels: nombres,
    datasets:[
    {
      label: "CU",
      fillColor: "rgba(57, 3, 255,0.5)",
      strokeColor: "rgba(57, 3, 255,0.8)",
      highlightFill: "rgba(57, 3, 255,0.75)",
      highlightStroke: "rgba(57, 3, 255,1)",
      data:habilidadesC
    },
    {
      label: "MU",
      fillColor: "rgba(57, 84, 255,0.5)",
      strokeColor: "rgba(57, 84, 255,0.8)",
      highlightFill: "rgba(57, 84, 255,0.75)",
      highlightStroke: "rgba(57, 84, 255,1)",
      data:habilidadesM
    },
    {
      label: "DU",
      fillColor: "rgba(57, 156, 255, 0.5)",
      strokeColor: "rgba(57, 156, 255, 0.8)",
      highlightFill: "rgba(57, 156, 255, 0.75)",
      highlightStroke: "rgba(57, 156, 255, 1)",
      data:habilidadesD
    },
    {
      label: "GU",
      fillColor: "rgba(135, 181, 255,0.5)",
      strokeColor: "rgba(135, 181, 255,0.8)",
      highlightFill: "rgba(135, 181, 255,0.75)",
      highlightStroke: "rgba(135, 181, 255,1)",
      data:habilidadesG
    }
    ]
  };

  var chartIndicador = new Chart(cIndicador).Bar(datosIndicador, {responsive: true});
  var chartParticipacion = new Chart(cParticipacion).Bar(datosParticipacion, {responsive: true});
  var chartHabilidades = new Chart(cHabilidades).Bar(datosHabilidades, {responsive: true});

});
