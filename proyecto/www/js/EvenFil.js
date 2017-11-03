document.addEventListener('deviceready', function(event) {
  getFiltros();
  getEventos();
  $(".filter-home").toggle();
});

// se sacan por que el deviceready solo es para movieles
getEventos();

//ver con toggleFeilter y con tapFilter
var toggleFilter = function(filtro) {
$(filtro).toggle("slow");
}


function getEventos (id) {
    jQuery.support.cors = true;
	  $.ajax({
    url: "http://192.168.2.115:8080/App/Server/vendor/slimEventos/public/api/eventos",
    dataType: "json",
    cache: false,
    timeout: 3000,
    method: 'GET',
    error: function() {
      ons.notification.alert('Problemas con  la conexión');
    }
  }).done(function(data, textStatus, jqXHR) {
     // console.log(data)
  if (id) {
       createFiltros2(data);
    }else{
       createEventos(data);
    }
   
  });
};


var getFiltros = function() {
  var urlReq = "http://10.0.2.2:8080/filtro";
  $.ajax({
    url: urlReq,
    timeout: 1000,
    method: 'POST',
    error: function() {
      ons.notification.alert('Problemas con la conexión');
    }
  }).done(function(data, textStatus, jqXHR) {
    createFiltros("filter-lugar", data.lugar);
    createFiltros("filter-categoria", data.categoria);
    createFiltros("filter-facultad", data.facultad);
  });
};


var createEventos = function(params) {
  var itemNode = document.getElementById("list-eventos");
  var htmlElement = "";
  var i = 0;
  for(i in params) {
   //console.log(params[i])
    htmlElement += "<div class='row'>\n";
    htmlElement += "<div class='col-md-4'>\n";
    htmlElement += "<ons-card class='list-item-container'>\n";
    htmlElement += "<span class='id'>"+params[i].ID_EVENTO +"</span>\n";
    htmlElement += "<ons-col>\n"; 
    htmlElement += "<img class='img' src='"+params[i].IMAGEN+"'/>" + "\n";
    htmlElement += "</ons-col>\n";
    htmlElement += "<div>\n";
    htmlElement += "<div class='nombre'>"+params[i].NOMBRE_EVENTO + "</div>\n";
    htmlElement += "<span class='text'>"+params[i].FECHA + "</span>\n";
    htmlElement += "<span class='text'>"+params[i].CATEGORIA + "</span>\n";
    htmlElement += "<div class='parrafe'>"+params[i].DESCRIPCION + "</div>\n";
    htmlElement += "<ons-button class='but'>"+'Reservar'+"</ons-button>\n";
    htmlElement += "<ons-button class='but'>"+'Favorito'+"</ons-button>\n";
    htmlElement += "<ons-button class='but'>"+'Ver más'+"</ons-button>\n";
    htmlElement += "</div>\n";
    htmlElement += "<div class='cojainfoEvento'>\n";
    htmlElement += "</ons-card >\n";
    htmlElement += "</div >\n";
    htmlElement += "</div>\n";
       }
  itemNode.innerHTML = htmlElement;
};

var createEventos2 = function(params) {
   var itemNode = document.getElementById("list-eventos");
  var htmlElement = "";
  var i = 0;
  for(i in params) {
    console.log(params[i]);
    htmlElement += "<ons-card>\n";
    htmlElement += params[i].LUGAR+ "\n";
    htmlElement += "</ons-card>\n";
  }

  itemNode.innerHTML = htmlElement;
};

var createFiltros = function(node, params) {
  var itemNode = document.getElementById(node);
  var htmlElement = "";
  var i = 0;
  for(i in params) {
    htmlElement += "<ons-list-item>\n";
    htmlElement += "<ons-checkbox value=\"" + params[i].key + "\">\n";
    htmlElement += params[i].nombre + "\n";
    htmlElement += "</ons-checkbox>\n";
    htmlElement += "</ons-list-item>\n";
  }

  itemNode.innerHTML = htmlElement;
};

 function tapFilter(vr){
    // console.log(filtro)
getEventos(1);

}

//Ver mas en eventos
var showDialog = function (id) {
  document
    .getElementById(id)
    .show();
};
var hideDialog = function (id) {
  document
    .getElementById(id)
    .hide();
};