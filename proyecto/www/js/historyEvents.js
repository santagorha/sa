var userId = 1; //id de pruebas que tiene 2 eventos en el historial

/*Funcion que consume el servicio
*/
function getHistoryEvents(){
  $.ajax({
        url: URL_EVENTS_USER_SERVICE,
        data: {
            user: userId
            },
        timeout: 3000,
        method: "GET"
    }).then(function(data, textStatus, jqXHR) {
        if (data.codeStatus == 200) {
           //alert(JSON.stringify(data.message));
           obtenerEvento(data.message);
        } else {
            ons.notification.alert("Error al leer JSON");
        }
    });
}

/* Funcion que recarga la pagina html histEvents.html
*/
var goHistoryEvents = function() {
    document.querySelector("#myNavigator").pushPage("histEvents.html");
};

/*Funcion que arma el objeto HTML con la informacion de cada evento
y la envia al div como objeto de una lista
*/
function obtenerEvento(message){
   var htmlObject = "";
   var event = document.getElementById('histEventos');
   for(let ID_EVENTO_USUARIO of message){
       htmlObject += "<ons-list-item tappable>"
       htmlObject += `<ons-row><h4><b>Nombre: </b>${ID_EVENTO_USUARIO.NOMBRE_EVENTO}</h4></ons-row>`;
       htmlObject += `<ons-row><h4><b>Fecha: </b>${ID_EVENTO_USUARIO.FECHA}</h4></></ons-row>`;
       htmlObject += `<ons-row><h4><b>Lugar: </b>${ID_EVENTO_USUARIO.LUGAR}</h4></ons-row>`;
       htmlObject += `<ons-row><h4><b>Creditos: </b>${ID_EVENTO_USUARIO.CREDITOS}</h4></ons-row>`;
       htmlObject += "</ons-list-item>"
   }
        event.innerHTML = htmlObject;
};