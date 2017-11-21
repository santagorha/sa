var indexEventos = 0;
var eventId = -1;

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

/**
 * Event listener encargado de imprimir la lista de eventos y los detalles de acuerdo a la página
 */
document.addEventListener("init", function(event) {
  if (event.target.id === "home"){
    indexEventos = 0;
    eventId = -1;
    getEventos();
  }
  else if (event.target.id === "eventDetail") {
    getEvento();
  }
});

function getEventos ( ) { // Consumo de servicio
  $.ajax({
    url: URL_EVENT_HOME_SERVICE,
    timeout: 5000,
    method: "GET",
    data: filtrosEventos,
    error: function() {
      ons.notification.alert("Problemas con  la conexión");
    }
  }).done(function(data, textStatus, jqXHR) {
    createEventos(data.eventos);
  });
};

function getEvento ( ) { // Consumo de servicio
  $.ajax({
    url: URL_EVENT_DETAIL_SERVICE,
    timeout: 2000,
    method: "GET",
    data: {
      evento : eventId
    },
    error: function() {
      ons.notification.alert("Problemas con  la conexión");
    }
  }).done(function(data, textStatus, jqXHR) {
    createEvento(data.evento);
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
    htmlElement += `<ons-button modifier="quiet" onclick="actualizarFavorito(${event.ID_EVENTO})">\n`;
    htmlElement += `<ons-icon icon="${marcaFavorito}"></ons-icon>\n`;
    htmlElement += `</ons-button>\n`;
    htmlElement += `<ons-button modifier="quiet" onclick="actualizarGuardado(${event.ID_EVENTO})">\n`;
    htmlElement += `<ons-icon icon="${marcaGuardado}"></ons-icon>\n`;
    htmlElement += `</ons-button>\n`;
    htmlElement += `</ons-row>\n`;
    htmlElement += `</ons-card>\n`;
  }

  if(indexEventos === 0) {
    itemNode.innerHTML = htmlElement;
  } else {
    itemNode.innerHTML += htmlElement;
  }
};

var createEvento = function(event) {
  var itemNode = document.getElementById("detalle-evento");
  var htmlElement = "";
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

  htmlElement += `<div">\n`;
  htmlElement += `<ons-row>\n`;
  htmlElement += `${event.NOMBRE_EVENTO}\n`;
  htmlElement += `</ons-row>\n`;
  htmlElement += `<ons-row>\n`;
  htmlElement += `${event.CATEGORIA}\n`;
  htmlElement += `</ons-row>\n`;
  htmlElement += `<ons-row>\n`;
  htmlElement += `${event.FECHA}\n`;
  htmlElement += `</ons-row>\n`;
  htmlElement += `<ons-row>\n`;
  htmlElement += `${event.DESCRIPCION}\n`;
  htmlElement += `</ons-row>\n`;
  htmlElement += `</div>\n`;
  htmlElement += `<ons-row>\n`;
  htmlElement += `<ons-button modifier="quiet" onclick="actualizarFavorito(${event.ID_EVENTO})">\n`;
  htmlElement += `<ons-icon icon="${marcaFavorito}"></ons-icon>\n`;
  htmlElement += `</ons-button>\n`;
  htmlElement += `<ons-button modifier="quiet" onclick="actualizarGuardado(${event.ID_EVENTO})">\n`;
  htmlElement += `<ons-icon icon="${marcaGuardado}"></ons-icon>\n`;
  htmlElement += `</ons-button>\n`;
  htmlElement += `</ons-row>\n`;

  itemNode.innerHTML = htmlElement;
};

var actualizarGuardado = function(eventId) {
  alert("por hacer" + eventId);
};

var actualizarFavorito = function(eventId) {
  alert("por hacer" + eventId);
};

var goToEvent = function(eventId) {
  this.eventId = eventId;
  fn.load("eventDetail.html");
};
