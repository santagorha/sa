var authUser = function() {
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  //Hace validación de usuario
  //Toca buscar una forma segura ya que hacer esta comparación acá no lo es
  if (username && password === 'secret') {
    localStorage.setItem('myPoliUser', username);
    window.location.replace("content.html");
  }
  else {
    ons.notification.alert('Datos de usuario incorrectos.');
  }
};
