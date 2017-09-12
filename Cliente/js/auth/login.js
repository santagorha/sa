document.addEventListener('init', function(event) {
  var page = event.target;
  var username = document.getElementById('username');
  var password = document.getElementById('password');
  var error = document.getElementById('errorMessage');
  if (page.id === 'login') {
    page.querySelector('#login').onclick = function() {
      //Hace validación de usuario
      //Toca buscar una forma segura ya que hacer esta comparación acá no lo es
      if (username.value === 'user' && password.value === 'secret') {
        document.querySelector('#myNavigator').pushPage('home.html', {
          data: {
            title: 'TODO'
          }
        });
      } else {
        username.style.backgroundColor = '#ffcdd2';
        password.style.backgroundColor = '#ffcdd2';
        error.style.display = 'inline';
      }
    };
    page.querySelector('#reestablecer').onclick = function(){
      window.open("https://cpo.poligran.edu.co/");
    }
  } else if (page.id === 'home') {
    page.querySelector('ons-toolbar .center').innerHTML = page.data.title;
  }
});
