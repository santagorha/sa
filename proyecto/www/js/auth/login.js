var myUser = localStorage.getItem("myPoliUser");

//reemplaza el init, porque hacen conflicto
document.addEventListener('deviceready', function(event) {
  alert(device.uuid);
  if (myUser) {
    window.location.replace("content.html");
  }
});

var authUser = function() {
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  //Toca buscar una forma segura ya que hacer esta comparación acá no lo es
  var urlReq = "http://110.0.2.2:8080/random?";
  urlReq += "username=";
  urlReq += username;
  urlReq += "&";
  urlReq += "password=";
  urlReq += password;
  urlReq += "&";
  urlReq += "uuid=";
  urlReq += "device.uuid";

  //falta control cuando no hay servicio disponible
  $.ajax({
    url: urlReq,
    timeout: 5000,
    error: function() {
      ons.notification.alert('Problemas con la conexión');
    }
  }).then(function( data, textStatus, jqXHR ) {
    if (data.token) {
      console.log(data.token);
      localStorage.setItem('myPoliUser', data.token);
      window.location.replace("content.html");
    }
    else {
      ons.notification.alert('Constraseña no valida');
    }
  });
};
