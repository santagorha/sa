/**
 * Método de transporte a la siguiente pantalla
 */
var goParticipants = function() {
    document.querySelector("#myNavigator").pushPage("participantes.html");
    getParticipantes(eventId);
};
/**
 * Método que consulta del servicio los participantes a un evento
 * Posterior a su uso llama al método encargado de crear la visualización de los mismos
 *
 * @param {Integer} eventId - Id del evento
 */
var getParticipantes = function(eventId) {
    $.ajax({
        url: URL_USERS_EVENT_SERVICE,
        data: {
            evento: eventId
        },
        timeout: 3000,
        method: "GET"
    }).then(function(data, textStatus, jqXHR) {
        createParticipantes(data.message);
    });
};
/**
 * Método que genera la visualización de participantes al evento
 *
 * @param {Object} params - Objeto retornado por el servicio que contiene la información de los participantes para visualizar
 */
var createParticipantes = function(params) {
<<<<<<< HEAD
  var itemNode = document.getElementById("list-participantes");
  var htmlElement = "";
  for (let user of params) {
    var checkParticipante = "";
    if(user.ASISTIDO == 1) {
      checkParticipante = " checked";
    }

    htmlElement += `<ons-list-item>\n`;
    htmlElement += `<div class="center"> ${user.NOMBRE_USUARIO} </div>\n`;
    htmlElement += `<div class="right">\n`;
    htmlElement += `<ons-switch ${checkParticipante} class="participante-check" value="${user.ID_EVENTO_USUARIO}">\n`;
    htmlElement += `</ons-switch>\n`;
    htmlElement += `</div>\n`;
    htmlElement += `</ons-list-item>\n`;
  }
  itemNode.innerHTML = htmlElement;
=======
    var itemNode = document.getElementById("list-participantes");
    var htmlElement = "";
    for (let user of params) {
        htmlElement += `<ons-list-item>\n`;
        htmlElement += `<div class="center"> ${user.NOMBRE_USUARIO} </div>\n`;
        htmlElement += `<div class="right">\n`;
        htmlElement += `<ons-switch class="participante-check" value="${user.ID_EVENTO_USUARIO}">\n</ons-switch>\n`;
        htmlElement += `</div>\n`;
        htmlElement += `</ons-list-item>\n`;
    }
    itemNode.innerHTML = htmlElement;
>>>>>>> 2d2a6329486139c5843d45742a806d51153a730d
};

/**
 * Método que actualiza el estado de la asistencia de los participantes
 */
var confirmParticipantes = function() {
    var checkedValues = $(".participante-check :checked").map(function() {
        return this.value;
    }).get();
  
    $.ajax({
        url: URL_CONFIRM_EVENT_SERVICE,
        data: {
            eventos: checkedValues.toString()
        },
        timeout: 3000,
        method: "POST"
    }).then(function(data, textStatus, jqXHR) {
        if (data.message) {
            ons.notification.alert("Se ha actualizado correctamente los asistentes");
            document.querySelector("#myNavigator").popPage();
        } else {
            ons.notification.alert("ERROR");
        }
    });
};
/**
 * Método que agrega a un usuario no inscritó al evento
 * Posterior a la correcta creación se vuelven a cargar los usuario
 */
var addUnknownUser = function() {
    var username = document.getElementById("searchUser").value;

    $.ajax({
        url: URL_UNKNOW_USER_SERVICE,
        data: {
            evento: eventId,
            username: username
        },
        timeout: 3000,
        method: "POST",
    }).then(function(data, textStatus, jqXHR) {
        if (jqXHR.status == 404) {
            ons.notification.alert("Usuario no encontrado");
        } else {
            createParticipantes(data.message);
        }
    });

};
