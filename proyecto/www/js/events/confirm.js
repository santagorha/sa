var goParticipants = function(eventId) {
    this.eventId = eventId;
    document.querySelector('#myNavigator').pushPage('participantes.html');
    getParticipantes(eventId);

};

var getParticipantes = function(eventId){
    var urlReq = "http://192.168.1.122:8090/asistencia/asistentes.php?";
    urlReq += "evento=" + eventId;
  $.ajax({
    url: urlReq,
    timeout: 1000,
    method: 'POST',
    error: function() {
      ons.notification.alert('Problemas con la conexión');
    }
  }).done(function(data, textStatus, jqXHR) {
    createParticipantes(data.participantes);
  });

};

var createParticipantes = function(params) {
  var itemNode = document.getElementById("list-participantes");
  var htmlElement = "";
    for(i in params) {
        htmlElement += "<ons-list-item>\n";
        htmlElement +=  "<div class=\"center\">";
        htmlElement +=  params[i].participante.nombre_usuario;
        htmlElement += "</div>";
        htmlElement +=  "<div class=\"right\">";
        htmlElement += "<ons-switch class=\"participante-check\" value=\""+ params[i].participante.id_evento_usuario +"\"></ons-switch>";
        htmlElement += "</div>";
        htmlElement += "</ons-list-item>\n";
    }

  itemNode.innerHTML = htmlElement;
};

var confirmParticipantes = function () {
    var checkedValues = $('.participante-check :checked').map(function() {
    return this.value;
}).get();

var urlReq = "http://192.168.1.122:8090/asistencia/confirmarAsistencia.php?";
    urlReq += "eventos=" + checkedValues;
$.ajax({
    url: urlReq,
    timeout: 1000,
    method: 'POST',
    error: function() {
      ons.notification.alert('Problemas con la conexión');
    }
  }).done(function(data, textStatus, jqXHR) {
	if(data > -1){
		ons.notification.alert("La cantidad de asistentes confirmados es de: " + data);
		document.querySelector('#myNavigator').pushPage('page1.html');
	} else {
		ons.notification.alert("ERROR");
	}
  });

 };
