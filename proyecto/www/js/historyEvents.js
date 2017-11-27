var userId = 3;

function historyEvents(){
  $.ajax({
        url: URL_EVENTS_USER_SERVICE,
        data: {
            user: userId
            },
        timeout: 3000,
        method: "GET"
    }).then(function(data, textStatus, jqXHR) {
        if (data.codeStatus == 200) {
           // alert(JSON.stringify(data));
            alert(1);
            getHistoryEvents(data.message[0].codeStatus);
        } else {
            ons.notification.alert("Error al leer JSON");
        }
    });
}

function getHistoryEvents(param){
    alerta(ingreso funcion);
};

var goHistoryEvents = function() {
    document.querySelector("#myNavigator").pushPage("historialEventos.html");
};