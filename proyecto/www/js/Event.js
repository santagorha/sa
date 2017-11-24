document.addEventListener('deviceready', function(event) { 
   getEventos();
   $(".filter-home").onblur();
});

  
getEventos(); // deviceready solo es para movieles

var objt=[]; // Arrglo para Objt  

function getEventos ( ) { // Consumo de servicio
    var URL_EVENTHOME_SERVICE="http://200.122.233.83/slim/public/api/eventos"; // Variable conts de consumo
    jQuery.support.cors = true; // Necesidad de curso
	  $.ajax({
    url: URL_EVENTHOME_SERVICE,
    dataType: "json",
    cache: false, // No se cuenta con cache storage movil quitar
    timeout: 3000,
    method: 'GET',
    error: function() {
      ons.notification.alert('Problemas con  la conexión');
    }
  }).done(function(data, textStatus, jqXHR) {
     objt=data; // captura dato en objeto
       createEventos(data);  
  });
};


// echo en html de consumo
var createEventos = function(params) {
  var itemNode = document.getElementById("list-eventos");
  var htmlElement = "";
  var i = 0;
  for(i in params) { 
    htmlElement += "<ons-row'>\n";
    htmlElement += "<ons-card  class='cojaEvento'>\n";
    htmlElement += "<span class='id'>"+params[i].ID_EVENTO +"</span>\n";
    htmlElement += "<img class='img' src='"+params[i].IMAGEN+"'/>" + "\n";
    htmlElement += "<div class='nombre'>"+params[i].NOMBRE_EVENTO + "</div>\n";
    htmlElement += "<span class='text'>"+params[i].FECHA + "</span>\n";
    htmlElement += "<span class='text'>"+params[i].CATEGORIA + "</span>\n";
    htmlElement += "<div class='parrafe'>"+params[i].DESCRIPCION + "</div>\n";
    htmlElement += "<ons-button class='center' >"+'Reservar'+"</ons-button>\n";
    htmlElement += "<ons-button >"+'Favorito'+"</ons-button>\n";
    htmlElement += "<ons-button >"+'Ver más'+"</ons-button>\n";
    htmlElement += "</ons-card >\n";
    htmlElement += "</ons-row>\n";
    }
  itemNode.innerHTML = htmlElement;
};


//Filter search bar
var createEventos2 = function(params) { //Params 
   console.log(params);
  $("#bbuscar").on("click",function(){ //Accion de button
    var busqueda = $.getJSON("http://200.122.233.83/slim/public/api/eventos/buscar/"+params+"",function(datos){ //consumo y envio de parametro
    createEventos(datos);
    });
 });
};



