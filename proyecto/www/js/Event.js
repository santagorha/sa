document.addEventListener('init', function(event) {
  if (event.target.id === 'home'){
    getEventos();
  }
});

function getEventos ( ) { // Consumo de servicio
	  $.ajax({
    url: URL_EVENTHOME_SERVICE,
    timeout: 3000,
    dataType: "json",
    method: 'GET',
    error: function() {
      ons.notification.alert('Problemas con  la conexión');
    }
  }).done(function(data, textStatus, jqXHR) {
       createEventos(data);
  });
};


// echo en html de consumo
var createEventos = function(params) {
  var itemNode = document.getElementById("list-eventos");
  var htmlElement = "";
  var i = 0;
  for(i in params) {
    htmlElement += "<ons-list-item'>\n";
    htmlElement += "<ons-card>\n";
    htmlElement += "<span class='id'>"+params[i].ID_EVENTO +"</span>\n";
    htmlElement += "<div class='nombre'>"+params[i].NOMBRE_EVENTO + "</div>\n";
    htmlElement += "<span class='text'>"+params[i].FECHA + "</span>\n";
    htmlElement += "<span class='text'>"+params[i].CATEGORIA + "</span>\n";
    htmlElement += "<div class='parrafe'>"+params[i].DESCRIPCION + "</div>\n";
    htmlElement += "<ons-button class='center'>"+'Reservar'+"</ons-button>\n";
    htmlElement += "<ons-button >"+'Favorito'+"</ons-button>\n";
    htmlElement += "<ons-button >"+'Ver más'+"</ons-button>\n";
    htmlElement += "</ons-card >\n";
    htmlElement += "</ons-list-item>\n";
    }
  itemNode.innerHTML = htmlElement;
  $(window).trigger('resize');
};
