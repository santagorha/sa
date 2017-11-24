
$(document).ready(c_eventos());

function c_eventos() {
    //muestra toda la informacion en tabla con ajax desde la bd
    var url3 ='http://200.122.233.83/api/routes/api.php/e_usuario';
    var url4 ='http://200.122.233.83/api/routes/api.php/allistar';
    var listev =$('.table-striped');
    //ajx evento
    $.ajax({
        url: url3,
        method:'GET',
        type: 'JSON'
    }).done(function (eventos) {

        $.ajax({  url: url4,
            method:'GET',
            type: 'JSON'  }).done(function (usuario) {



        });

        var ceven = JSON.parse(eventos);

        $.each (ceven,function (g,index) {

            var iduser =  ceven[g].ID_USUARIO;

            console.log(iduser);

            var idingresado = 2;

            if (iduser == idingresado){

            $('.table-striped').append('<tr ><td>'+ ceven[g].ID_USUARIO + '</td>' +'<td>'+ ceven[g].ID_EVENTO + '</td>'+ '<td>' + ceven[g].ASISTIDO + '</td>'+ '<td>' + ceven[g].ROL_EVENTO + '</td>'+ '<td>' + ceven[g].MARCA_GUARDADO + '</td>'+ '<td>' + ceven[g].MARCA_FAVORITO + '</td></tr>');

            //listusers.append('<tr ><td>'+ even[i].NOMBRE_EVENTO + '</td>' +  '<td>' + even[i].FECHA + '<td>'+ even[i].RESUMEN + '</td>' + '<td>'+ even[i].DESCRIPCION + '</td>' + '<td>'+ even[i].CATEGORIA + '</td>' + '<td>'+ even[i].SEDE + '</td>'+ '<td>'+ even[i].LUGAR + '</td>'+ '<td>'+ even[i].CUPOS + '</td>'+ '<td>'+ even[i].DURACION_HORAS + '</td>'+ '<td>'+ even[i].FACULTAD + '</td>'+ '<td>'+ even[i].CREDITOS + '</td>' + "<td><input type='button' id=\"btn btn-info\" name='bot' class=\"btn btn-info\"  value="+ even[i].ID_EVENTO +" > Agregar Evento</input> </td>");
            }
        });

    });
}

