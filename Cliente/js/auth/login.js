var authUser = function() {
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  //Hace validación de usuario
  //Toca buscar una forma segura ya que hacer esta comparación acá no lo es
  if (username === 'bob' && password === 'secret') {
    document.querySelector('#appNavigator').pushPage('home.html');
  }
  else {
    ons.notification.toast('Datos de usuario incorrectos.');
  }
};

var reestablecer = function() {
  window.open("https://cpo.poligran.edu.co/");
};

window.fn = {};

window.fn.toggleMenu = function () {
  document.getElementById('appSplitter').right.toggle();
};

window.fn.loadView = function (index) {
  document.getElementById('appTabbar').setActiveTab(index);
  document.getElementById('sidemenu').close();
};

window.fn.loadLink = function (url) {
  window.open(url, '_blank');
};

window.fn.pushPage = function (page, anim) {
  if (anim) {
    document.getElementById('appNavigator').pushPage(page.id, { data: { title: page.title }, animation: anim });
  } else {
    document.getElementById('appNavigator').pushPage(page.id, { data: { title: page.title } });
  }
};

ons.ready(function () {
  const sidemenu = document.getElementById('appSplitter');
  ons.platform.isAndroid() ? sidemenu.right.setAttribute('animation', 'overlay') : sidemenu.right.setAttribute('animation', 'reveal');

  document.querySelector('#tabbar-page').addEventListener('postchange', function(event) {
    if (event.target.matches('#appTabbar')) {
      event.currentTarget.querySelector('ons-toolbar .center').innerHTML = event.tabItem.getAttribute('label');
    }
  });
});
