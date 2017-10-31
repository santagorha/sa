document.addEventListener('deviceready', function(event) {
    getFiltros();
    getEventos();
    $(".filter-home").toggle();
  });

  getEventos();
  
  var tapFilter = function(filtro) {
    $(filtro).toggle("slow");
  };
  
  function getEventos (id) {
  var urlReq = "http://200.122.233.83/slim/public/api/eventos";
        $.ajax({
      url: urlReq,
      timeout: 3000,
      method: 'POST',
      error: function() {
        ons.notification.alert('Problemas con la conexión');
      }
    }).done(function(data, textStatus, jqXHR) {
      // console.log(data)
      if (id) {
         createEventos2(data);
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
      htmlElement += "<ons-card>\n";
      htmlElement +=  "<span class='uno'>"+params[i].ID_EVENTO +"</span>" + params[i].CATEGORIA + params[i].LUGAR + params[i].FECHA+ params[i].IMAGEN+ "\n";
      htmlElement += "</ons-card>\n";
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
      htmlElement +=  params[i].LUGAR + "\n";
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
   // console.log(vr)
  getEventos(1)
  
  }