document.addEventListener('init', function(event) {
  loadUser();
});

function loadUser() {
  $.ajax({
    data: {},
    dataType: "json",
    error: function (err) {

    },
    success: function (data) {
      if (data.codeStatus === 200) {
        if (data.ID_USUARIO) {
          redirect("content.html");
        }
      }
    },
    type: "post",
    url: URL_USER_SERVICE
  });
}

function login() {
  var user = $("#user");
  if (user.val() === "") {
    user.addClass("err");
    return false;
  } else {
    user.removeClass("err");
  }
  var pwd = $("#pwd");
  if (pwd.val() === "") {
    pwd.addClass("err");
    return false;
  } else {
    pwd.removeClass("err");
  }
  $.ajax({
    data: {
      user: user.val(),
      pwd: pwd.val()
    },
    dataType: "json",
    error: function (err) {
      if(err.responseJSON){
        showError(err.responseJSON.message);
      } else {
        showError("Problemas de conexión");
      }
    },
    success: function (data) {
      if (data.codeStatus === 200) {
        if (data.message === "authorized") {
          redirect("home.php?user=" + user.val() );
        }
      }
    },
    type: "post",
    url: URL_LOGIN_SERVICE
  });
}
