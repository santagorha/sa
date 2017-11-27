
<?php 
if(!isset($_GET['accion'])){ 
     
    //Formulario para agregar a favoritos 
    echo "<form method='get' action='favoritos.php?accion=agregar%agregar=" . $_GET['ID_de_pelicula'] . "'><button>Agregar a favoritos</button></form>"; 
     
}elseif($_GET['accion'] == "agregar" ){ 
     
    //Inicio la sesion (depende de como utilices este codigo) 
    session_start(); 
     
    //Redacto la sentencia, en donde pido que en el GET agregar se encuentre el codigo ID de la pelicula
    //Y ademas utilizo el codigo ID del usuario (tambien sirve el numbre de usuario, el correo electronico, o lo que sea que utilices para identificarlo)
    $sql = "INSERT INTO * FROM favoritos(ID_pelicula, usuario) VALUE('" . $_GET['agregar'] . "', '" . $_SESSION['ID_de_usuario'] . "')";

    $agregar = mysql_query($sql); 
     
    //Compruebo si realmente se pudo agregar, y muestro el texto de a continuacion con un enlace paraver los favoritos de esa persona.
    //De lo contrario muestro cual fue el error. 
    if($agregar){ 
        echo "Agregado a favoritos. <a target='_top' href='favoritos.php=accion=mostrar&usuario=" . $_SESSION['ID_de_usuario'] . "'>Ver todos tus favoritos</a>";
    }else{ 
        echo "Ocurrio el siguiente error: " . mysql_error(); 
    } 
}elseif($_GET['accion'] == "mostrar" ){ 
     
    //Vuelvo a abrir la sesion 
    session_start(); 
     
    //Y aqui viene algo que tal vez no estes muy familiarizado, que son las tablas relacionadas las cuales deben ser InnoDB
    //Selecciono de la tabla favoritos todos los campos (*), y luego el campo titulo_pelicula (y le cambio el nombre de manera tamporal a titulo)
    //Y el codigo ID de la tabla pelicula (y tambien le cambio el nombre de manera temporal por codigo_pelicula)
     
    //Luego con WHERE pido que se extraigan todas las filas en las que aparece el usuario y hago que coincida el ID de la pelicula con el titulo
    $sql_favoritos = "SELECT favoritos.*, tabla_peliculas.titulo_pelicula AS titulo, tabla_peliculas.ID_pelicula AS codigo_pelicula FROM favoritos ";
    $sql_favoritos .= "WHERE favoritos.usuario = '" . $_GET['usuario'] . "' AND favoritos.ID_pelicula = tabla_peliculas.ID_pelicula";
     
    $mostrar = mysql_query($sql_favoritos); 

    //Aqui, pregunto si puedo extrarse los datos 
    if($mostrar){ 
        //Y en caso de que el usuario no posea favoritos se mostrara una linea que dice que no tiene favoritos.
        if(mysql_num_rows($mostrar) != 0){     
            echo "<table>"; 
                echo "<tr>"; 
                    echo "<th>ID</th>"; 
                    echo "<th>Nombre de pelicula</th>"; 
                echo "</tr>"; 
             
            //Y por ultimo creo una tabla y coloco los valores que extraje hace unos momentos.
            while($favorito = mysql_fetch_array($mostrar)){ 
                echo "<tr>"; 
                    echo "<td>" . $favorito['codigo_pelicula'] . "</td>"; 
                    echo "<td><a href='pelicula.php?id=" . $favorito['codigo_pelicula'] . "'>" . $favorito['titulo'] . "</a></td>"; 
                echo "</tr>"; 
            } 
             
            echo "</table>"; 
        }else{ 
            echo "Usted aun no posee favoritos.";     
        } 
    }else{ 
        echo "Ocurrio el siguiente error al querer mostrar los favoritos: " . mysql_error();    
    } 
     
} 

//Recuerda siempre cerrar las conexiones que abras a traves de mysql_connect(), porque de no hacerlo, sobrecargaras el servidor y se bloqueara.
//Te lo digo por experiencia propia, espero que te haya sido util el codigo, porque de veras que inverti algo de tiempo en el.
//Saludos 
?> 