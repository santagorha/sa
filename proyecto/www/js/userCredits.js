var username = 'DEGUALTEROS';

function getUserCredits(){
  $.ajax({
        url: URL_USER_CREDITS_SERVICE,
        data: {
            user: username
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

var goUserCredits = function() {
    document.querySelector("#myNavigator").pushPage("creditosUsuario.html");
};