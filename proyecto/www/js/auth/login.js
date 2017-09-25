var myUser = localStorage.getItem("myPoliUser");

document.addEventListener('init', function(event) {
  if (myUser) {
    window.location.replace("content.html");
  }
});

document.addEventListener("deviceready", onDeviceReady, false);
var onDeviceReady = function() {
  ons.notification.toast(device.uuid);
};

var authUser = function() {
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  //Toca buscar una forma segura ya que hacer esta comparación acá no lo es
  var urlReq = "http://192.168.1.122:8080/random?";
  urlReq += "username=";
  urlReq += username;
  urlReq += "&";
  urlReq += "password=";
  urlReq += password;
  // urlReq += "&";
  // urlReq += "deviceId=";
  // urlReq += deviceId;

  $.when($.ajax({
    url: urlReq,
    error: function() {
      ons.notification.alert('Problemas con la conexión');
    }
  })).then(function( data, textStatus, jqXHR ) {
    if (data) {
      console.log(data);
      localStorage.setItem('myPoliUser', data.token);
      window.location.replace("content.html");
    }
  });
};
