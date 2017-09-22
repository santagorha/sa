var myUser = localStorage.getItem("myPoliUser");

document.addEventListener('init', function(event) {
  if (myUser) {
    window.location.replace("content.html");
  }
});

// document.addEventListener("deviceready", onDeviceReady, false);
// function onDeviceReady() {
//   ons.notification.toast(device.uuid);
// };

var authUser = function() {
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  //Toca buscar una forma segura ya que hacer esta comparación acá no lo es
  var urlReq = "http://localhost:8080/random?";
  urlReq += "username=";
  urlReq += username;
  urlReq += "&";
  urlReq += "password=";
  urlReq += password;
  // urlReq += "&";
  // urlReq += "deviceId=";
  // urlReq += deviceId;

  $.when( $.ajax( urlReq ) ).then(function( data, textStatus, jqXHR ) {
    if (data) {
      localStorage.setItem('myPoliUser', data.token);
      window.location.replace("content.html");
    }
    else {
      ons.notification.alert('Datos de usuario incorrectos.');
    }
  });

};
