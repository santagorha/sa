var logout = function() {
  localStorage.removeItem("myPoliUser");
  window.location.replace("index.html");
};
