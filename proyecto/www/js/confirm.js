var goParticipants = function() {
  document.querySelector("#myNavigator").pushPage("participantes.html");
  getParticipantes(eventId);

};

var getParticipantes = function(eventId) {
  $.ajax({
    url: URL_USERS_EVENT_SERVICE,
    data: {
      evento: eventId
    },
    timeout: 1000,
    method: "POST",
    error: function() {
      ons.notification.alert("Problemas con la conexión");
    }
  }).done(function(data, textStatus, jqXHR) {
    createParticipantes(data.message);
  });

};

var createParticipantes = function(params) {
  var itemNode = document.getElementById("list-participantes");
  var htmlElement = "";
  for(let user of params) {
    htmlElement += "<ons-list-item>\n";
    htmlElement +=  "<div class=\"center\">";
    htmlElement +=  user.NOMBRE_USUARIO;
    htmlElement += "</div>";
    htmlElement +=  "<div class=\"right\">";
    htmlElement += "<ons-switch class=\"participante-check\" value=\""+ user.ID_EVENTO_USUARIO +"\"></ons-switch>";
    htmlElement += "</div>";
    htmlElement += "</ons-list-item>\n";
  }

  itemNode.innerHTML = htmlElement;
};

var confirmParticipantes = function () {
  var checkedValues = $(".participante-check :checked").map(function() {
    return this.value;
  }).get();


  $.ajax({
    url: URL_CONFIRM_EVENT_SERVICE,
    data: {
      eventos: checkedValues.toString()
    },
    timeout: 1000,
    method: "POST",
    error: function() {
      ons.notification.alert("Problemas con la conexión");
    }
  }).done(function(data, textStatus, jqXHR) {
    if(data.message){
      ons.notification.alert("Se ha actualizado correctamente los asistentes");
      document.querySelector("#myNavigator").popPage();
    } else {
      ons.notification.alert("ERROR");
    }
  });

};
