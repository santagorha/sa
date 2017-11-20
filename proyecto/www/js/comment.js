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