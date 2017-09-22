var myUser = localStorage.getItem("myPoliUser");
// var deviceId = device.uuid;

document.addEventListener('init', function(event) {
  ons.notification.toast(myUser);
});

// document.addEventListener("deviceready", onDeviceReady, false);
// function onDeviceReady() {
//   console.log(device.cordova);
// };
