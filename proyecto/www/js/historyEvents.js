var userId = 3;

function historyEvents(){
  $.ajax({
        url: URL_EVENTS_USER_SERVICE,
        data: {
            user: userId
        },
        timeout: 3000,
        method: "GET"
    }).then(function(data, textStatus, jqXHR) {
        if (data.history) {
            alert(JSON.stringify(data));            
        } else {
            ons.notification.alert("ERROR");
        }
    });
}