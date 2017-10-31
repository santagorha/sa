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
    //url: "http://localhost/PoliEventos/wwww/json.json",
    url: "http://200.122.233.83/slim/public/api/eventos",
    dataType: "json",
    cache: false,
    timeout: 3000,
    method: 'GET',
    error: function() {
      ons.notification.alert('Fallo con la conexión');
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
    htmlElement += "<ons-card class='cajaEventos'>\n";
    htmlElement += "<span class='id'>"+params[i].ID_EVENTO +"</span>\n"; 
    
    htmlElement +="<img class='img' src='"+params[i].IMAGEN+"'/>" + "\n";
   //htmlElement +="<span class='img' img src="+poliEventos/www/img/logo.jpg+">" + "</span>\n";
    //htmlElement +=src="poliEventos/www/img/logo.jpg";
    
    htmlElement += "<div class='nombre'>"+params[i].NOMBRE_EVENTO + "</div>\n";
    htmlElement +="<span class='fecha'>"+params[i].FECHA + "</span>\n";
    htmlElement +="<span >"+params[i].DURACION_HORAS + "</span>\n"; 
    htmlElement +="<br>\n";
    htmlElement += "<div class='cojainfoEvento'>\n";
    htmlElement +="<span >"+'Resumen:'+params[i].RESUMEN + "</span>\n"; 
    htmlElement +="<br>\n";
    htmlElement +="<span >"+'Descripcion:'+ params[i].DESCRIPCION + "</span>\n"; 
    htmlElement +="<br>\n";
    htmlElement +="<span >"+'Categoria:'+params[i].CATEGORIA + "</span>\n"; 
    htmlElement +="<br>\n";
    htmlElement +="<span >"+'Sede:'+params[i].SEDE + "</span>\n";
    htmlElement +="<span >"+'Lugar:'+params[i].LUGAR + "</span>\n";
    htmlElement +="<br>\n";
    htmlElement +="<span >"+'Cupos:'+params[i].CUPOS + "</span>\n"; 
    htmlElement +="<span >"+'Creditos:'+params[i].CREDITOS + "</span>\n";
    htmlElement +="<br>\n";
    htmlElement +="<span >"+'Facultad:'+params[i].FACULTAD + "</span>\n"; 
    htmlElement +="<div>\n";
    htmlElement +="<a id='like' class='btn btn-lg btn-block btn-shared btn-favorite'>\n";
    htmlElement +="<span class='fa fa-star pull-left'>"+'favorito'+"</span>\n";
    htmlElement +="<span class='favorite-text'>"+"</span>\n";
    htmlElement +="<span class='unfavorite-text'>"+"</span>\n";
    htmlElement += "</a>\n";
    htmlElement += "</div \n";
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