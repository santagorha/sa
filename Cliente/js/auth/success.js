var myUser = localStorage.getItem("myPoliUser");

document.addEventListener('init', function(event) {
  ons.notification.toast(myUser);
});
