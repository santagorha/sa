<?php 

// llamamos clase usuario
require( '../app/usuario.php' );
$classUser = new Usuario();

// Variables predefinidas
$valid_file = TRUE;
$target_dir = "../www/img/";

//if they DID upload a file...
if($_FILES['FOTO']['name']){
	//if no errors...
	if(!$_FILES['FOTO']['error']){
		//now is the time to modify the future file name and validate the file
		$new_file_name = strtolower($_FILES['FOTO']['tmp_name']); //rename file

		//can't be larger than 1 MB
		if($_FILES['FOTO']['size'] > (1024000)){
			$valid_file = false;
			$message = 'Oops!  Your file\'s size is to large.';
		}
		
		//if the file has passed the test
		if( $valid_file ){
			// IMG Nombre
			$nameImg = $_FILES['FOTO']['name'];

			// IMG base64
			$target_file = $target_dir . basename($_FILES["FOTO"]["name"]);

			// Move it to where we want it to be
			move_uploaded_file( $_FILES['FOTO']['tmp_name'], $target_file );
			$message = 'Congratulations!  Your file was accepted.';

			// Guardamos nombre en la BD
			$classUser->fotoUsuario( $_POST[ 'ID_USUARIO' ], $nameImg );

			header( 'Location: ../www/perfil.php?user=' . $_POST[ 'NOMBRE1' ] );
		}
	}
	//if there is an error...
	else{
		//set that to be the returned message
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['FOTO']['error'];
	}
}

//you get the following information for each file:
// $_FILES['FOTO']['name']
// $_FILES['FOTO']['size']
// $_FILES['FOTO']['type']
// $_FILES['FOTO']['tmp_name']

?>