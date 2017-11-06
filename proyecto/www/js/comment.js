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

    htmlEl += `<label> ID_COMENTARIO ${comentario.ID_COMENTARIO} </label></br>`;
    htmlEl += `<label> ID_USUARIO ${comentario.ID_USUARIO} </label></br>`;
    htmlEl += `<label> ID_EVENTO ${comentario.ID_EVENTO} </label></br>`;
    htmlEl += `<label> FECHA ${comentario.FECHA} </label></br>`;
    htmlEl += `<label> TEXTO ${comentario.TEXTO} </label></br>`;

  }
  comElement.innerHTML = htmlEl;

}



document.addEventListener('init', comment());

//$(document.ready(comment()));