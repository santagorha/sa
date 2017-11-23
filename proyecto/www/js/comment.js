var indexComentarios = 0;
/**
* Event listener encargado de imprimir la lista de eventos y los detalles de acuerdo a la página
*/
document.addEventListener("init", function(event) {
  if (event.target.id === "eventDetail") {
    getComments();
    indexComentarios = 0;
  }
});

function getComments ( ) { // Consumo de servicio
  $.ajax({
    url: URL_COMMENT_SERVICE,
    timeout: 5000,
    method: "GET",
    data: {
      evento: eventId
    },
    error: function() {
      ons.notification.alert("Problemas con  la conexión");
    }
  }).then(function(data, textStatus, jqXHR) {
    fillComentarios(data.comentarios);
  });
}

function fillComentarios(comentarios) {
  var nodeItem = document.getElementById("commentElement");
  var htmlElement = "";

  for(let comentario of comentarios) {
    htmlElement += `<ons-list-item>\n`;
    htmlElement += `<ons-row> USUARIO: ${comentario.NOMBRE_USUARIO} </ons-row>\n`;
    htmlElement += `<ons-row"> FECHA ${comentario.FECHA} </ons-row>\n`;
    htmlElement += `<ons-row> TEXTO_COMENTARIO ${comentario.TEXTO} </ons-row>\n`;
    htmlElement += `</ons-list-item>\n`;
  }
  if(indexComentarios === 0) {
    nodeItem.innerHTML = htmlElement;
  } else {
    nodeItem.innerHTML += htmlElement;
  }
}
