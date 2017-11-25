var indexEventos = 0;
var eventId = 1;
var seccionId = 0;

/**
* Objeto js que contiene el estado de los filtros
*/
var filtrosEventos = {
  seccion: seccionId,
  lugarId: null,
  horaInicial: null,
  horaFinal: null,
  fechaInicial: null,
  fechaFinal: null,
  categoriaId: null,
  facultadId: null,
  index: indexEventos
};

/**
* Event listener encargado de imprimir la lista de eventos y los detalles de acuerdo a la página
*/
document.addEventListener("init", function(event) {
  if (event.target.id === "home"){
    indexEventos = 0;
    eventId = -1;
    if(seccionId === 0) {
      getFiltros();
      $(".filters").show();
      $(".filter-home").hide();
    } else {
      $(".filters").hide();
    }
    getEventos();
  }
  else if (event.target.id === "eventDetail") {
    getEvento();
  }
});

/**
* Consumo del ws para obtener los filtros de db
*/
function getFiltros ( ) {
  $.ajax({
    url: URL_FILTERS_SERVICE,
    timeout: 5000,
    method: "GET",
    error: function() {
      ons.notification.alert("Problemas con  la conexión");
    }
  }).then(function(data, textStatus, jqXHR) {
    createFiltros(data);
  });
};

/**
* Consumo del ws para la info de todos los eventos en próximos
*/
function getEventos ( ) {
  $.ajax({
    url: URL_EVENT_HOME_SERVICE,
    timeout: 5000,
    method: "GET",
    data: filtrosEventos,
    error: function() {
      ons.notification.alert("Problemas con  la conexión");
    }
  }).then(function(data, textStatus, jqXHR) {
    createEventos(data.eventos);
  });
};

/**
* Consumo del ws para obtener los detalles del evento
*/
function getEvento ( ) {
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
  }).then(function(data, textStatus, jqXHR) {
    createEvento(data.evento);
  });
};

/**
* Creación de filtros en la pantalla de búsqueda
* @param {Object} params - Objeto retornado por el servicio que contiene la info de los filtros
*/
var createFiltros = function(params) {
  var itemNodeCategorias = document.getElementById("filters-categorias");
  var itemNodeFacultades = document.getElementById("filters-facultades");
  var itemNodeSedes = document.getElementById("filters-sedes");

  var htmlElementCategorias = "";
  var htmlElementFacultades = "";
  var htmlElementSedes = "";

  for(let categoria of params.categorias) {
    htmlElementCategorias += `<ons-list-item>\n`;
    htmlElementCategorias += `<ons-checkbox class="check-categoria" value="${categoria.ID_CATEGORIA}">`;
    htmlElementCategorias += `${categoria.NOMBRE_CATEGORIA}\n`;
    htmlElementCategorias += `</ons-checkbox>\n`;
    htmlElementCategorias += `</ons-list-item>\n`;
  }
  for(let facultad of params.facultades) {
    htmlElementCategorias += `<ons-list-item>\n`;
    htmlElementCategorias += `<ons-checkbox class="check-facultad" value="${facultad.ID_FACULTAD}">`;
    htmlElementCategorias += `${facultad.NOMBRE_FACULTAD}\n`;
    htmlElementCategorias += `</ons-checkbox>\n`;
    htmlElementCategorias += `</ons-list-item>\n`;
  }
  for(let sede of params.sedes) {
    htmlElementCategorias += `<ons-list-item>\n`;
    htmlElementCategorias += `<ons-checkbox class="check-sede" value="${sede.ID_SEDE}">`;
    htmlElementCategorias += `${sede.NOMBRE_SEDE}\n`;
    htmlElementCategorias += `</ons-checkbox>\n`;
    htmlElementCategorias += `</ons-list-item>\n`;
  }

  itemNodeCategorias.innerHTML = htmlElementCategorias;
  itemNodeFacultades.innerHTML = htmlElementFacultades;
  itemNodeSedes.innerHTML = htmlElementSedes;
};


/**
* Creación de contenido HTML de eventos
* @param {Object} params - Objeto retornado por el servicio que contiene la info de los eventos
*/
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
    htmlElement += `${event.NOMBRE_CATEGORIA}\n`;
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

/**
* Creación de detalles de evento
* @param {Object} params - Objeto retornado por el servicio que contiene la info del evento
*/
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

  htmlElement += `<ons-row>`;
  htmlElement += `${event.NOMBRE_EVENTO}`;
  htmlElement += `</ons-row>\n`;
  htmlElement += `<ons-row>`;
  htmlElement += `${event.NOMBRE_CATEGORIA}`;
  htmlElement += `</ons-row>\n`;
  htmlElement += `<ons-row>`;
  htmlElement += `${event.FECHA}`;
  htmlElement += `</ons-row>\n`;
  htmlElement += `<ons-row>`;
  htmlElement += `${event.DESCRIPCION}`;
  htmlElement += `</ons-row>\n`;
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

/**
* Actualización del guardado
* @param {Object} params - Id del evento a guardar
*/
var actualizarGuardado = function(eventId) {
  alert("por hacer" + eventId);
};

/**
* Actualización del favorito
* @param {Object} params - Id del evento a ser favorito
*/
var actualizarFavorito = function(eventId) {
  alert("por hacer" + eventId);
};

/**
* Navegación a evento
* @param {Object} params - Id del evento a revisar
*/
var goToEvent = function(eventId) {
  this.eventId = eventId;
  fn.load("eventDetail.html");
};

/**
* Despliega/repliega los filtros
* @param {Object} params - Id del filtro a guardar
*/
var toogleFilter = function(filterId) {
  $(filterId).toggle("slow");
};