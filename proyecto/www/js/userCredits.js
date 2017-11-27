var username = 'DEGUALTEROS'; //usuario de prueba para calcular creditos

/*Funcion de consumo de servicio 
*/
function getUserCredits(){
  $.ajax({
        url: URL_USER_CREDITS_SERVICE,
        data: {
            username: username
            },
        timeout: 3000,
        method: "GET"
    }).then(function(data, textStatus, jqXHR) {
        if (data.codeStatus == 200) {
         // alert(JSON.stringify(data.credits));
          obtenerCreditos(data.credits);  
        } else {
            ons.notification.alert("ERROR");
        }
    });
}

/*Funcion que recibe la cantidad de creditos del usuario y lo traduce
en un codigo HTML que se reemplaza en el div "creditos" localizado en
el archivo "creditosUsuario.html"
*/
function obtenerCreditos(credits){
    nodeItem = document.getElementById('creditos');
    var htmlCode = "";
    htmlCode += `<ons-fab ripple size="contain">${credits}</ons-fab>`;
    nodeItem.innerHTML = htmlCode;
};

/* Funcion para redirigir nuevamente al html "creditosUsuario.html"
*/
var goUserCredits = function() {
    document.querySelector("#myNavigator").pushPage("creditosUsuario.html");
};