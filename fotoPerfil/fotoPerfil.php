
<?php
$user="DEGUALTEROS"; 
$db=new mysqli('localhost','root','','appeventos');
if($db->connect_errno){
echo $db->connect_error;
}
$pull="select * from imagenusuario  where usuario='$user'";
$allowedExts = array("jpg", "jpeg", "gif", "png","JPG");
$extension = @end(explode(".", $_FILES["file"]["name"]));
if(isset($_POST['subir'])){
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/JPG")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 200000)
&& in_array($extension, $allowedExts))
{
	if ($_FILES["file"]["error"] > 0)
	{
	echo "Codigo: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{
		echo '<div class="plus">';
		echo "Cargada Exitosamente";
		echo '</div>';echo"<br/><b><u>Detalles de la imagen</u></b><br/>";

		echo "Nombre: " . $_FILES["file"]["name"] . "<br/>";
		echo "Tipo: " . $_FILES["file"]["type"] . "<br/>";
		echo "Tamaño: " . ceil(($_FILES["file"]["size"] / 1024)) . " KB";

		if (file_exists("upload/" . $_FILES["file"]["name"]))
		{
		unlink("upload/" . $_FILES["file"]["name"]);
		}
		else{
			$pic=$_FILES["file"]["name"];
			$conv=explode(".",$pic);
			$ext=$conv['1'];
			move_uploaded_file($_FILES["file"]["tmp_name"],"upload/". $user.".".$ext);
			echo "</br>Almacenada en: " . "upload/".$user.".".$ext;
			$url=$user.".".$ext;

			$query="update imagenusuario set url='$url', fechacarga=now() where usuario='$user'";
			if($upl=$db->query($query)){
			echo "<br/>Guardado en la base de datos exitosamente!";
			}
		 }
	}
}else{
 echo "Límite de tamaño de la imagen  200 KB, Usar tamaño de imagen inferior a 200 KB";
}
}
?>
<form action="" method="post" enctype="multipart/form-data">
<?php
$res=$db->query($pull);
$pics=$res->fetch_assoc();
echo '<div class="imgLow">';
echo "<img src='upload/$pics[url]' alt='profile picture' width='80 height='64'   class='doubleborder'/></div>";
?>
<input type="file" name="file" />
<input type="submit" name="subir" class="button" value="Cargar"/>
</form>
