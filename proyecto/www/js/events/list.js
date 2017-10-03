document.addEventListener('deviceready', function(event) {
  createEventos("list-eventos", eventos.lista);
  createFiltros("filter-lugar", itemPerFilter.lugar);
  createFiltros("filter-categoria", itemPerFilter.categoria);
  createFiltros("filter-facultad", itemPerFilter.facultad);

  $(".filterHome").toggle();
});

var toggleFilter = function(filtro) {
  $(filtro).toggle("slow");
};

var createEventos = function(node, params) {
  var itemNode = document.getElementById(node);
  var htmlElements = "";
  for(i in params) {
    htmlElement += "<ons-list-item>\n";
    htmlElement += params[i].nombre + params[i].categoria + params[i].lugar + params[i].diahora + "\n";
    htmlElement += "</ons-list-item>\n";
  }

  itemNode.innerHTML = htmlElement;
};

var createFiltros = function(node, params) {
  var itemNode = document.getElementById(node);
  var htmlElements = "";
  for(i in params) {
    htmlElement += "<ons-list-item>\n";
    htmlElement += "<ons-checkbox value=\"" + params[i].key + "\">\n";
    htmlElement += params[i].nombre + "\n";
    htmlElement += "</ons-checkbox>\n";
    htmlElement += "</ons-list-item>\n";
  }

  itemNode.innerHTML = htmlElement;
};
