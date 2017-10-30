<?php

// CREACION BASE DE DATOS APPEVENTOS--------------------------------------------------------------------------------------------------------------------
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//se prepara la peticion
$sql= "CREATE DATABASE APPEVENTOS";
//se ejecuta la peticion
if(mysql_query($sql, $conexion)){
	echo "Se ha creado la base de datos";
}else{
echo "No se ha podido crear la base de datos por el siguiente error: ". mysql_error();
}
// se cierra la conexion
mysql_close($conexion);


//SE CREAN LAS TABLAS ---------------------------------------------------------------------------------------------------------------------------------
//SE CREA LA TABLA INFO******************************************************************************************************************************** 
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
CREATE TABLE INFO(
	ID_INFO SMALLINT NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	VERSION DECIMAL(3,1) NOT NULL,
	LAST_MODIFY DATE NOT NULL,
	ABOUT VARCHAR(100) NOT NULL
)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);

//SE CREA LA TABLA CIUDAD*******************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
/*INSERT INTO INFO (1, 0.1, '2017-9-10', 'Base de datos del proyecto eventos del poli')
*/
CREATE TABLE CIUDAD(
	ID_CIUDAD SMALLINT NOT NULL PRIMARY KEY,
	NOMBRE_CIUDAD VARCHAR(30) NOT NULL,
	INDICATIVO SMALLINT NOT NULL
)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


//SE CREA LA TABLA FACULTAD*******************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
CREATE TABLE FACULTAD (
	ID_FACULTAD SMALLINT NOT NULL PRIMARY KEY,
	NOMBRE_FACULTAD VARCHAR(100) NOT NULL
)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


//SE CREA LA TABLA SEDE*******************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
CREATE TABLE SEDE (
	ID_SEDE SMALLINT NOT NULL PRIMARY KEY,
	NOMBRE_SEDE VARCHAR(50) NOT NULL,
	DIRECCION VARCHAR(50) NOT NULL,
	ID_CIUDAD SMALLINT(2) NOT NULL,
	TELEFONO VARCHAR(100),
	CONSTRAINT FK_CIUDAD FOREIGN KEY (ID_CIUDAD) REFERENCES CIUDAD(ID_CIUDAD)
)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


//SE CREA LA TABLA TIPO USUARIO*******************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
CREATE TABLE TIPO_USUARIO (
	ID_TIPO_USUARIO SMALLINT NOT NULL PRIMARY KEY,
	TIPO_USUARIO VARCHAR(50) NOT NULL
)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


//SE CREA LA TABLA USUARIO*******************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
CREATE TABLE USUARIO (
	ID_USUARIO SMALLINT NOT NULL PRIMARY KEY, 
	NOMBRE_USUARIO VARCHAR(15) NOT NULL,
	NOMBRE1 VARCHAR(25) NOT NULL,
	NOMBRE2 VARCHAR(25),
	APELLIDO1 VARCHAR(25) NOT NULL,
	APELLIDO2 VARCHAR(25),
	CORREO VARCHAR(50) NOT NULL,
	FECHA_NACIMIENTO DATE NOT NULL,
	SEXO BOOL NOT NULL,
	CIUDAD SMALLINT(2) NOT NULL,
	FOTO VARCHAR(300) NOT NULL,
	TIPO_USUARIO SMALLINT NOT NULL,
	CONSTRAINT USUARIOS_TIPOSUSUARIOS FOREIGN KEY (TIPO_USUARIO) REFERENCES TIPO_USUARIO(ID_TIPO_USUARIO),
	CONSTRAINT USUARIOS_CIUDADES FOREIGN KEY (CIUDAD) REFERENCES CIUDAD(ID_CIUDAD)
)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


//SE CREA LA TABLA EVENTO*******************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
CREATE TABLE EVENTO(
	ID_EVENTO SMALLINT NOT NULL PRIMARY KEY,
	NOMBRE_EVENTO VARCHAR(50) NOT NULL,
	FECHA DATETIME NOT NULL,
	IMAGEN VARCHAR(300),
	RESUMEN VARCHAR(100) NOT NULL,
	DESCRIPCION VARCHAR(250) NOT NULL,
	CATEGORIA VARCHAR(25) NOT NULL,
	SEDE SMALLINT NOT NULL,
	LUGAR VARCHAR(25) NOT NULL,
	CUPOS SMALLINT(3),
	DURACION_HORAS DECIMAL(2,1) NOT NULL,
	FACULTAD SMALLINT NOT NULL,
	CREDITOS SMALLINT(2),
	CONSTRAINT EVENTOS_SEDES FOREIGN KEY (SEDE) REFERENCES SEDE(ID_SEDE),
	CONSTRAINT EVENTOS_FACULTAD FOREIGN KEY (FACULTAD) REFERENCES FACULTAD(ID_FACULTAD)
)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


//SE CREA LA TABLA SERIE*******************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
CREATE TABLE SERIE (
	ID_SERIE SMALLINT NOT NULL,
	ID_EVENTO SMALLINT NOT NULL,
	CONSTRAINT PK_SERIES PRIMARY KEY (ID_SERIE, ID_EVENTO),
	CONSTRAINT SERIES_EVENTOS FOREIGN KEY (ID_EVENTO) REFERENCES EVENTO(ID_EVENTO)
)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


//SE CREA LA TABLA EVENTO USUARIO*******************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
CREATE TABLE EVENTO_USUARIO (
	ID_EVENTO_USUARIO SMALLINT NOT NULL,
	ID_USUARIO SMALLINT NOT NULL,
	ID_EVENTO SMALLINT NOT NULL,
	ASISTIDO BOOL,
	ROL_EVENTO VARCHAR(50) NOT NULL,
	MARCA BOOL NOT NULL,
	CONSTRAINT PK_EVENTOS_USUARIOS PRIMARY KEY (ID_EVENTO_USUARIO, ID_USUARIO, ID_EVENTO),
	CONSTRAINT EVENTOS_USUARIOS_USUARIOS FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO),
	CONSTRAINT EVENTOS_USUARIOS_EVENTOS FOREIGN KEY (ID_EVENTO) REFERENCES EVENTO (ID_EVENTO)
)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);



//SE CREA LA TABLA SESION*******************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
CREATE TABLE SESION (
	ID_SESION SMALLINT NOT NULL PRIMARY KEY,
	ID_USUARIO SMALLINT NOT NULL,
	NOMBRE_USUARIO VARCHAR(25) NOT NULL,
	DISPOSITIVO VARCHAR(300) NOT NULL,
	CONSTRAINT SESIONES_USUARIOS FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);



//SE CREA LA TABLA LOG*******************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
CREATE TABLE LOG (
	ID_LOG SMALLINT NOT NULL PRIMARY KEY,
	ID_USUARIO SMALLINT NOT NULL,
	NOMBRE_USUARIO VARCHAR(25) NOT NULL,
	FECHA DATETIME NOT NULL,
	CATEGORIA VARCHAR(50) NOT NULL,
	DESCRIPCION VARCHAR(100) NOT NULL
)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


//SE CREA LA TABLA CENTRO*******************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
CREATE TABLE CENTRO (
	ID_CENTRO SMALLINT NOT NULL PRIMARY KEY,
	NOMBRE_CENTRO VARCHAR(100) NOT NULL,
	ID_CIUDAD SMALLINT NOT NULL,
	ID_SEDE SMALLINT NOT NULL, 
	DIRECCION VARCHAR(100) NOT NULL,
	CORREO VARCHAR(100),
	TELEFONO VARCHAR(100), 
	CONSTRAINT FK_CENTRO_CIUDAD FOREIGN KEY (ID_CIUDAD) REFERENCES CIUDAD (ID_CIUDAD),
	CONSTRAINT FK_CENTRO_SEDE FOREIGN KEY (ID_SEDE) REFERENCES SEDE (ID_SEDE)
)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);

//POBLACION DE LAS TABLAS----------------------------------------------------------------------------------------------------------------------------------------
// SE POBLA LA TABLA INFO****************************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la abse de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "INSERT INTO INFO VALUES (1, '2.5', '2017/10/09', 'ULTIMA VERSION'), (2, '1.0', '2017/10/05', 'VERSION ESTABLE')";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


// SE POBLA LA TABLA CIUDAD****************************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la abse de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "INSERT INTO CIUDAD VALUES (1, 'BOGOTA', 1), (2, 'MEDELLIN', 4), (3, 'PUERTO CARREÑO', 8)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);

// SE POBLA LA TABLA FACULTAD****************************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "INSERT INTO FACULTAD VALUES (1, 'INGENIERIA Y CIENCIAS BASICAS'), (2, 'MERCADEO COMUNICACION Y ARTES'), (3, 'CIENCIAS SOCIALES'), (4, 'CIENCIAS ADMINISTRATIVAS, ECONOMICAS Y CONTABLES')";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


// SE POBLA LA TABLA TIPO USUARIO****************************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "INSERT INTO TIPO_USUARIO VALUES (1, 'ADMINISTRADOR'), (2,'USUARIO ESTANDAR'), (3, 'ADMINISTRADOR DE EVENTOS')";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


// SE POBLA LA TABLA SEDE ****************************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "INSERT INTO SEDE VALUES (1, 'SEDE BOGOTA', 'Calle 57 Nº 3-00 Este', 1, '744 07 40'), (2, 'SEDE MEDELLIN', 'Carrera 74 # 52 - 20', 2, '(4) 6048122 Ext:6008/6009')";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);

// SE POBLA LA TABLA CENTRO ****************************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "INSERT INTO CENTRO VALUES 
(1, 'Usaquén Calle 125', 1, 1, 'Cll. 125 No. 7C - 50', 'calle125@poli.edu.co', '(1)7562942 Ext 1014 3173721247'), 
(2, 'Suba PG', 1, 1, 'Cll. 147 No. 101 - 12 Centro Comercial. Fiesta Suba Entrada 1 Piso 1', ' suba2@poligran.edu.co', '(1) 7455555 Ext.1700 314 477 15'), 
(3, 'Portal Norte', 1, 1, 'Cra. 22 No. 161 – 12', 'csuportalnorte@poligran.edu.co', '(1) 6775450 319 365 12 90'), 
(4, 'Country PG', 1, 1, 'Cra. 19 No. 84 - 72', 'country1@poli.edu.co', '(1) 7440740 Ext1420 3134771581'), 
(5, 'Calle 80', 1, 1, 'Cra. 19 No. 84 - 72', 'country1@poli.edu.co', '(1) 7440740 Ext1420 3134771581'), 
(6, 'Calle 170 - Colegio Marroquín Campestre', 1, 1, 'Av. Cra. 7 No. 170B - 54', 'csucalle170s@poligran.edu.co', '(1) 677 05 65 - 311 549 86 75'), 
(7, 'Medellín - Centro', 2, 2, 'Cra. 42 No. 50 - 15 Int. 202 Cra. Córdoba entre las calles Colombia y la Playa', 'medellin2@poligran.edu.co', '(4) 293 5955 - 320 6677952'), 
(8, 'Medellín - Carrera 80', 2, 2, 'Cll. 49F No. 80 - 13 ', 'medellin2@poligran.edu.co', '(4) 293 5955 - 320 6677952'), 
(9, 'Medellín - Barrio Los Colores (PG)', 2, 2, 'Cra. 74 No. 52 - 20', 'lymontoya@poligran.edu.co', '(4) 6040200 Ext.6023 320 476762'), 
(10, 'Bello (PG)', 2, 2, 'Cll. 50 No. 50 - 80 Interior 201 Bello', 'csubelloc@poligran.edu.co', '(4) 456 2094 - 3108570504')";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


// SE POBLA LA TABLA USUARIO ****************************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
INSERT INTO USUARIO VALUES (1, 'DEGUALTEROS', 'DAVID', 'EDUARDO', 'GUALTEROS', 'GUALTERO', 'DEGUALTEROS@POLIGRAN.EDU.CO', '1989/5/15', 1, 1, 'XXX.JPG', 1),
(2, 'jmdiazn', 'JUAN', 'MANUEL', 'DIAZ', 'NUÑEZ', 'jmdiazn@poligran.edu.co', '1992/01/01', 1, 2, 'xx22.JPG', 2),
(3, 'feescobarb', 'FRANCISCO', 'ENRIQUE', 'ESCOBAR', 'BELTRAN', 'feescobarb@poligran.edu.co', '1995-10-5', 1, 2, '123.JPG', 3),
(4, 'amrubior', 'ANGELICA', 'MARIA', 'RUBIO', 'RANGEL', 'amrubior@poligran.edu.co', '1990-5-25', 0, 1, 'abc.JPG', 2)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


// SE POBLA LA TABLA EVENTO ****************************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
INSERT INTO EVENTO VALUES
(1, 'ASESORIA MATEMATICAS', '2017/12/7', 'img.JPG', 'TEMAS DE REPASO: ALGEBRA BASICA Y TRIGONOMETRIA', 'DESCRIPCION X', 'categoria INGENIERIA', 1, 'SALON 3', 15, '1.5', 3, 2),
(2, 'ASESORIA PROGRAMACION', '2017/10/10', 'img45.JPG', 'TEMAS DE REPASO: PHP Y SQL', 'DESCRIPCION Y', 'categoria INGENIERIA', 2, 'SALON 101', 8, '2.4', 1, 0),
(3, 'ASESORIA DIBUJO', '2017/8/1', 'img4234343243.JPG', 'TEMAS DE REPASO: TRAZO Y COLOR', 'DESCRIPCION Z', 'categoria ARTES', 1, 'SALON DIBUJO', 10, '3', 2, 2)";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


// SE POBLA LA TABLA LOG ****************************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
INSERT INTO LOG VALUES 
(1, 1, 1, '2017/10/9', 'LOGIN', 'INGRESO A APP' ),
(2, 3, 3, '2017/7/10', 'EDIT', 'EDICION DE EVENTO' 	),
(3, 2, 2, '2017/11/1', 'LOGOUT', 'SALIDA DE APP' )";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);


// SE POBLA LA TABLA EVENTO USUARIO ****************************************************************************************************************************************
// se selecciona servidor, usuario y contraseña
  $conexion = mysql_connect("localhost", "root", "");
//se valida la conexion exitosa
if(!$conexion){
	die('No se ha podido conectar: '.mysql_error());
}
//selecciono la base de datos
mysql_select_db("APPEVENTOS",$conexion);
//se prepara la peticion
$sql= "
INSERT INTO EVENTO_USUARIO VALUES 
(1, 4, 1, 0, 'ASISTENTE', 0),
(2, 1, 3, 1, 'ASISTENTE', 1), 
(3, 2, 1, 0, 'ASISTENTE', 1), 
(4, 2, 2, 1, 'ASISTENTE', 0), 
(5, 3, 1, 1, 'ASISTENTE', 1)
";
//se ejecuta la peticion
mysql_query($sql, $conexion);
// se cierra la conexion
mysql_close($conexion);

?>
