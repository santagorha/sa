

function generarToken($idusuario, $username){
   // Se genera una cadena para tokens
   $cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
   $token = sha1($cadena);
 
 // Se hace la conexio a la base de datos
   $conexion = new mysqli('localhost', 'root', '','bd');

   // Se inserta el registro en la tabla tblreseteopass del token generado
   $sql = "INSERT INTO tblreseteopass (idusuario, username, token, creado) VALUES($idusuario,'$username','$token',NOW());";
   $resultado = $conexion->query($sql);

}


function enviarEmail( $correo, $password){
   $mensaje = '<html>
     <head>
        <title>Recordar tu contraseña</title>
     </head>
     <body>
       <p>Hemos recibido una petición para Recordar la contraseña de tu cuenta.</p>
       <p>
         <strong>La contraseña de tu cuenta es:</strong><br>
          <a "'$password'"> </a>
       </p>
     </body>
    </html>';
 
   $cabeceras = 'MIME-Version: 1.0' . "\r\n";
   $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $cabeceras .= 'From: Poligran <mimail@poligran.com>' . "\r\n";
   // Se envia el correo al usuario
   mail($email, "Recuperar contraseña", $mensaje, $cabeceras);
}


$email = $_POST['email'];
 
$respuesta = new stdClass();
 
if( $email != "" ){ //validamos si el email no esta vacio

   $conexion = new mysqli('localhost', 'root', '','bd');  // Se hace la conexio a la base de datos
   if($conexion->connect_errno){
    echo "No Conectado";
   }else{
    echo "Conectado";
   }



   $sql = " SELECT * FROM users WHERE email = '$email'"; //Busaqueda en la tabla usuarios
   $resultado = $conexion->query($sql);
   if($resultado->num_rows > 0){
      $usuario = $resultado->fetch_assoc();
      $linkTemporal = generarToken( $usuario['id'], $usuario['username'] );
      if($linkTemporal){
            enviarEmail( $email, $password);
              $respuesta->mensaje = '<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para recuperar la contraseña </div>';
      }
   }
   else
      $respuesta->mensaje = '<div class="alert alert-warning"> No existe una cuenta asociada a ese correo. </div>';
}
else
   $respuesta->mensaje= "Debes introducir el email de la cuenta";
 echo json_encode( $respuesta );