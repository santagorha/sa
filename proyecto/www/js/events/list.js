document.addEventListener('deviceready', function(event) {
  getEventos();
  getFiltros();

  $(".filter-home").toggle();
});

var toggleFilter = function(filtro) {
  $(filtro).toggle("slow");
};

var getEventos() {
  var url = "";
  $.ajax({
    url: urlReq,
    timeout: 3000,
    method: 'POST',
    error: function() {
      ons.notification.alert('Problemas con la conexión');
    }
  }).then(function(data, textStatus, jqXHR) {
    createEventos(data.eventos);
  });
};

var getFiltros() {
  var url = "";
  $.ajax({
    url: urlReq,
    timeout: 3000,
    method: 'POST',
    error: function() {
      ons.notification.alert('Problemas con la conexión');
    }
  }).then(function(data, textStatus, jqXHR) {
    createFiltros("filter-lugar", data.lugar);
    createFiltros("filter-categoria", data.categoria);
    createFiltros("filter-facultad", data.facultad);
  });
};

var createEventos = function(params) {
  var itemNode = document.getElementById("list-eventos");
  var htmlElement = "";

  for(i in params) {
    htmlElement += "<ons-list-item>\n";
    htmlElement += params[i].nombre + params[i].categoria + params[i].lugar + params[i].fechahora + "\n";
    htmlElement += "</ons-list-item>\n";
  }

  itemNode.innerHTML = htmlElement;
};

var createFiltros = function(node, params) {
  var itemNode = document.getElementById(node);
  var htmlElement = "";

  for(i in params) {
    htmlElement += "<ons-list-item>\n";
    htmlElement += "<ons-checkbox value=\"" + params[i].key + "\">\n";
    htmlElement += params[i].nombre + "\n";
    htmlElement += "</ons-checkbox>\n";
    htmlElement += "</ons-list-item>\n";
  }

  itemNode.innerHTML = htmlElement;
};
