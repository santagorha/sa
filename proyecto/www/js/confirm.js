/**
 * Event listener encargado de imprimir los participantes al evento
 */
document.addEventListener('show', function(event) {
  if (event.target.matches('#participantes')) {
    getParticipantes();
  }
}, false);

/**
 * Método de transporte a la siguiente pantalla
 */
var goParticipants = function() {
    document.querySelector("#myNavigator").pushPage("participantes.html");
};

/**
 * Método que consulta del servicio los participantes a un evento
 * Posterior a su uso llama al método encargado de crear la visualización de los mismos
 */
var getParticipantes = function() {
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
    var itemNode = document.getElementById("list-participantes");
    var htmlElement = "";
    for (let user of params) {
        var checkParticipante = "";
        if(user.ASISTIDO == 1) {
            checkParticipante = " checked";
        }

        htmlElement += `<ons-list-item tappable modifier="nodivider">\n`;
        htmlElement += `<label for="userEvent-${user.ID_EVENTO_USUARIO}" class="center"> ${user.NOMBRE_USUARIO} </label>\n`;
        htmlElement += `<div class="left">\n`;
        htmlElement += `<ons-checkbox modifier="noborder" ${checkParticipante} class="participante-check" input-id="userEvent-${user.ID_EVENTO_USUARIO}" value="${user.ID_EVENTO_USUARIO}">\n`;

        htmlElement += `</ons-checkbox>\n`;
        htmlElement += `</div>\n`;
        htmlElement += `</ons-list-item>\n`;
    }
    itemNode.innerHTML = htmlElement;
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
            eventos: checkedValues.toString(),
            evento: eventId
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
