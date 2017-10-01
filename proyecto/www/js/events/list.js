document.addEventListener('deviceready', function(event) {
  createEvento("list-eventos", eventos);

  insertIntoEventos();

  $(".filterHome").toggle();
});


var toggleFilter = function(filtro) {
  $(filtro).toggle("slow");
};


var createEvento = function(node, params) {
  var itemNode = document.getElementById(node);
  var htmlElements = "";
  for(i in params) {
    var htmlElement  =
    htmlElement += "<ons-list-item>\n";
    htmlElement += params[i].nombre + params[i].categoria + params[i].lugar + params[i].diahora + "\n";
    htmlElement += "</ons-list-item>\n";
  }
  node.innerText = htmlElement;
};


var createFiltros = function(node, params) {
    var itemNode = document.getElementById(node);
    var htmlElements = "";
    for(i in params) {
      var htmlElement  =
      htmlElement += "<ons-list-item>\n";
      htmlElement += "<ons-checkbox class=\"filter-" + params[] + "\" value=\"something\" checked>GENERADO</ons-checkbox>\n";
      htmlElement += "</ons-list-item>\n";
    }
    node.innerText = htmlElement;
};
