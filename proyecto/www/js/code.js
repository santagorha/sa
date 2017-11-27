

$(document).ready(cargar);



function cargar() {
    //muestra toda la informacion en tabla con ajax desde la bd
    var url ='http://200.122.233.83/api/routes/api.php/evlistar';
    var listusers =$('.table');
    //var form =$('.formulario');

    //ajx evento
        $.ajax({
             url: url,
             method:'GET',
             type: 'JSON'
        }).done(function (eventos) {

           var even = JSON.parse(eventos);

           $.each(even,function (i,item) {

              listusers.append('<tr ><td>'+ even[i].NOMBRE_EVENTO + '</td>' +  '<td>' + even[i].FECHA + '<td>'+ even[i].RESUMEN + '</td>' + '<td>'+ even[i].DESCRIPCION + '</td>' + '<td>'+ even[i].CATEGORIA + '</td>' + '<td>'+ even[i].SEDE + '</td>'+ '<td>'+ even[i].LUGAR + '</td>'+ '<td>'+ even[i].CUPOS + '</td>'+ '<td>'+ even[i].DURACION_HORAS + '</td>'+ '<td>'+ even[i].FACULTAD + '</td>'+ '<td>'+ even[i].CREDITOS + '</td>' + "<td><input type='button' id=\"btn btn-info\" name='bot' class=\"btn btn-info\"  onclick=\"Notifi();\"  value="+ even[i].ID_EVENTO +" > Agregar Evento</input> </td>");

                        });

            $("input[name=bot]").unbind("click").click(function () {
              var  t = $(this).val();
                consultar(t);
                    


            });

        });
}




            function consultar(t) {

                var url ='http://200.122.233.83/api/routes/api.php/evlistar';
                var url1 ='http://200.122.233.83/api/routes/api.php/allistar';


                    $.ajax({
                        url: url1,
                        method: 'GET',
                        type: 'JSON'
                    }).done(function(alumnos) {
                        var alum = JSON.parse(alumnos);
                        var nomusuario = alum[t - 1].NOMBRE_USUARIO;
                        var idusuario = 2;
                        $.ajax({
                            url: url,
                            method: 'GET',
                            type: 'JSON'
                        }).done(function(eventos) {
                            var even = JSON.parse(eventos);
                            var idevento = even[t - 1].ID_EVENTO;
                            finalizar(nomusuario, idevento,idusuario)
                        });
                    });
                }

                function finalizar(nombre, idevento,idusua) {
                    var asistido ="1";
                    var rol_evento="Asistonto";
                    var mar_guardado = "1";
                    var mar_favorito ="1";
                    console.log(nombre, idevento,idusua,asistido,rol_evento,mar_guardado,mar_favorito);


                    var nom =nombre;
                    var ideven = idevento;
                    var idusuario = idusua;

                    /*
                    var coda= document.getElementById("coda").value;
                    var codm= document.getElementById("codm").value;*/

                    var parametros = {

                        "ID_USUARIO": idusuario,
                        "ID_EVENTO": ideven,
                        "ASISTIDO": asistido,
                        "ROL_EVENTO": rol_evento,
                        "MARCA_GUARDADO": mar_guardado,
                        "MARCA_FAVORITO": mar_favorito,


                    }



                    $.ajax({

                        url: "http://200.122.233.83/api/routes/api.php/agregar",
                        method: 'POST',
                        data: parametros,
                        success: function(restpuesta) {

                            $(".mostrar").text("se agrego con exito ");
                        },
                        error: function (xhr, status) {
                            alert ("a ocurrido un errror");
                        },
                        complete: function (xhr, status) {
                            $(".mostrar").text("se agrego con exito ");
                        }

                    });


                }


                
