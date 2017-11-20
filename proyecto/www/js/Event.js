var filtrosEventos = {
  seccion: 0,
  lugarId: null,
  horaInicial: null,
  horaFinal: null,
  fechaInicial: null,
  fechaFinal: null,
  categoriaId: null,
  facultadId: null
};

document.addEventListener('init', function(event) {
  if (event.target.id === 'home'){
    getEventos();
  }
});

function getEventos ( ) { // Consumo de servicio
  $.ajax({
    url: URL_EVENTHOME_SERVICE,
    timeout: 5000,
    method: 'GET',
    data: filtrosEventos,
    error: function() {
      ons.notification.alert('Problemas con  la conexión');
    }
  }).done(function(data, textStatus, jqXHR) {
    createEventos(data.eventos);
  });
};


// echo en html de consumo
var createEventos = function(params) {
  var itemNode = document.getElementById("list-eventos");
  var htmlElement = "";
  for(let event of params) {
    var marcaGuardado = "fa-bookmark";
    var marcaFavorito = "fa-star";
    //TODO cambiar validación
    if (true) {
      //En caso de no estar guardado
      marcaGuardado += "-o";
    }
    //TODO cambiar validación
    if (true) {
      //En caso de no ser favorito
      marcaFavorito += "-o";
    }
    htmlElement += `<ons-card>\n`;
    htmlElement += `<div onclick="goToEvent(${event.ID_EVENTO})">\n`;
    htmlElement += `<ons-row>\n`;
    htmlElement += `${event.NOMBRE_EVENTO}\n`;
    htmlElement += `</ons-row>\n`;
    htmlElement += `<ons-row>\n`;
    htmlElement += `${event.CATEGORIA}\n`;
    htmlElement += `</ons-row>\n`;
    htmlElement += `<ons-row>\n`;
    htmlElement += `${event.FECHA_PROGRAMADO}\n`;
    htmlElement += `</ons-row>\n`;
    htmlElement += `</div>\n`;
    htmlElement += `<ons-row>\n`;
    htmlElement += `<ons-button modifier="quiet" onclick="actualizarFavorito(${event.ID_EVENTO})">`;
    htmlElement += `<ons-icon icon="${marcaFavorito}"></ons-icon>\n`;
    htmlElement += `</ons-button>\n`;
    htmlElement += `<ons-button modifier="quiet" onclick="actualizarGuardado(${event.ID_EVENTO})">`;
    htmlElement += `<ons-icon icon="${marcaGuardado}"></ons-icon>\n`;
    htmlElement += `</ons-button>\n`;
    htmlElement += `</ons-row>\n`;
    htmlElement += `</ons-card>\n`;

  }
  itemNode.innerHTML = htmlElement;
};

var actualizarGuardado = function(idEvento) {
  alert("por hacer" + idEvento);
};

var actualizarFavorito = function(idEvento) {
  alert("por hacer" + idEvento);
};
