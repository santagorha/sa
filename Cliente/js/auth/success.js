var myUser = localStorage.getItem("myPoliUser");


// document.addEventListener('init', function(event) {
//   ons.notification.toast(myUser);
// });

document.addEventListener("deviceready", onDeviceReady, false);
function onDeviceReady() {
  var deviceId = device.uuid;
  ons.notification.alert(deviceId);
};
