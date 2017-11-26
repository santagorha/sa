document.addEventListener('deviceready', ondeviceready, false);




   function Notifi (){

   	
    cordova.plugins.notification.local.schedule({
            id: 1,
            title: "Atento!!!!!",
            message: "Este evento se ha agregado a tu lista "
            
            });

    }