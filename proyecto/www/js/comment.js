var idevento = 1;

function comment(){
  console.log("hola");
  $.ajax({
    data: {"evento": idevento},
    error: function (err) {
      console.log(err.responseText);
      console.log(err.responseJSON);
    },
    success: function (data) {
      if (data.codeStatus === 200) {
        //alert(JSON.stringify(data.comentarios));
        llenarComentario(data.comentarios);
      }
    },
    type: "get",
    url: URL_COMMENT_SERVICE
  });
}



function llenarComentario(comentarios){
  var comElement = document.getElementById('commentElement');
  var htmlEl = "";
    
  for(let comentario of comentarios){

    htmlEl += `<p class="usuario"> ID_USUARIO ${comentario.ID_USUARIO} </p>`;
    htmlEl += `<p class="fechaCommnet"> FECHA ${comentario.FECHA} </p>`;
    htmlEl += `<div class="comment"><p> TEXTO_COMENTARIO ${comentario.TEXTO} </p></div></br>`;

    /*
    htmlElement += `<ons-list-item>\n`;
    htmlElement += `<ons-switch ID_USUARIO ${comentario.ID_USUARIO} class="usuario">\n`;
    htmlElement += `</ons-list-item>\n`;

    */


  }
  comElement.innerHTML = htmlEl;

}



document.addEventListener('init', comment());

//$(document.ready(comment()));
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