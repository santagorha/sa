var myUser = localStorage.getItem("myPoliUser");

//reemplaza el init, porque hacen conflicto
document.addEventListener("deviceready", onDeviceReady, false);
function onDeviceReady() {
  if (!myUser) {
    window.location.replace("content.html");
  }

};
