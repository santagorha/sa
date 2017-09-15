document.addEventListener('init', function(event) {
  var page = event.target;
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;
  var error = document.getElementById('errorMessage');
  if (page.id === 'login') {
    page.querySelector('#login').onclick = function() {
      //Hace validación de usuario
      //Toca buscar una forma segura ya que hacer esta comparación acá no lo es
      if (username === 'user' && password === 'secret') {
        document.querySelector('#myNavigator').pushPage('home.html', {
          data: {
            title: 'TODO'
          }
        });
      } else {
        //ons.notification.alert('Datos de usuario incorrectos.');
        toggleToast();
      }
    };
    page.querySelector('#reestablecer').onclick = function(){
        window.open("RecordarContrasena.html");
    }
  } else if (page.id === 'home') {
    page.querySelector('ons-toolbar .center').innerHTML = page.data.title;
  }
});


function toggleToast() {
  document.querySelector('ons-toast').toggle();
}
