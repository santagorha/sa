document.addEventListener('init', function(event) {
  if(page.id === 'home') {
    loadUser();
  }
});

function loadUser() {
  $.ajax({
    dataType: "json",
    error: function (err) {
      var dataErr = err.responseJSON;
      if (dataErr.codeStatus === 401) {
        if (dataErr.message === 'unauthorized') {
          redirect("index.html");
        }
      }
    },
    success: function (data) {
      if (data.codeStatus === 200) {
        document.title = document.title + " " + data.NOMBRE_USUARIO;
        $("#lblWelcome").html("Bienvenido " + data.NOMBRE_USUARIO);
      }
    },
    type: "post",
    url: URL_USER_SERVICE
  });
}

function logout() {
  $.ajax({
    dataType: "json",
    error: function (err) {
      if (err.responseJSON) {
        showError(err.responseJSON.message);
      } else {
        showError("Error de conectividad " + err);
        redirect("index.html");
      }
    },
    success: function (data) {
      if (data.codeStatus === 200) {
        if (data.message === "closed session") {
          redirect("index.html");
        }
      }
    },
    type: "post",
    url: URL_LOGOUT_SERVICE
  });
}
