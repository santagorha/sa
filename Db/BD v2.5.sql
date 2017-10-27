    /*
     * Version de la base de datos: 2.5
     * Compatible con el estándar SQL99
     */

CREATE DATABASE APPEVENTOS;

USE APPEVENTOS;

CREATE TABLE INFO(
	ID_INFO SMALLINT NOT NULL AUTO_INCREMENT  PRIMARY KEY,
	VERSION DECIMAL(3,1) NOT NULL,
	LAST_MODIFY DATE NOT NULL,
	ABOUT VARCHAR(100) NOT NULL
);

/*INSERT INTO INFO (1, 0.1, '2017-9-10', 'Base de datos del proyecto eventos del poli')
*/
CREATE TABLE CIUDAD(
	ID_CIUDAD SMALLINT NOT NULL PRIMARY KEY,
	NOMBRE_CIUDAD VARCHAR(30) NOT NULL,
	INDICATIVO SMALLINT NOT NULL
);


CREATE TABLE FACULTAD (
	ID_FACULTAD SMALLINT NOT NULL PRIMARY KEY,
	NOMBRE_FACULTAD VARCHAR(100) NOT NULL
);


CREATE TABLE SEDE (
	ID_SEDE SMALLINT NOT NULL PRIMARY KEY,
	NOMBRE_SEDE VARCHAR(50) NOT NULL,
	DIRECCION VARCHAR(50) NOT NULL,
	ID_CIUDAD SMALLINT(2) NOT NULL,
	TELEFONO VARCHAR(100),
	CONSTRAINT FK_CIUDAD FOREIGN KEY (ID_CIUDAD) REFERENCES CIUDAD(ID_CIUDAD)
);


CREATE TABLE TIPO_USUARIO (
	ID_TIPO_USUARIO SMALLINT NOT NULL PRIMARY KEY,
	TIPO_USUARIO VARCHAR(50) NOT NULL
);


CREATE TABLE USUARIO (
	ID_USUARIO SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	NOMBRE_USUARIO VARCHAR(15) NOT NULL,
	NOMBRE1 VARCHAR(25) NOT NULL,
	NOMBRE2 VARCHAR(25),
	APELLIDO1 VARCHAR(25) NOT NULL,
	APELLIDO2 VARCHAR(25),
	CORREO VARCHAR(50) NOT NULL,
	FECHA_NACIMIENTO DATE NOT NULL,
	SEXO BOOL NOT NULL,
	CIUDAD SMALLINT(2) NOT NULL,
	FOTO VARCHAR(300),
	TIPO_USUARIO SMALLINT NOT NULL,
	CONSTRAINT USUARIOS_TIPOSUSUARIOS FOREIGN KEY (TIPO_USUARIO) REFERENCES TIPO_USUARIO(ID_TIPO_USUARIO),
	CONSTRAINT USUARIOS_CIUDADES FOREIGN KEY (CIUDAD) REFERENCES CIUDAD(ID_CIUDAD)
);


CREATE TABLE EVENTO(
	ID_EVENTO SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
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
);

CREATE TABLE SERIE (
	ID_SERIE SMALLINT NOT NULL AUTO_INCREMENT,
	ID_EVENTO SMALLINT NOT NULL,
	CONSTRAINT PK_SERIES PRIMARY KEY (ID_SERIE, ID_EVENTO),
	CONSTRAINT SERIES_EVENTOS FOREIGN KEY (ID_EVENTO) REFERENCES EVENTO(ID_EVENTO)
);

CREATE TABLE EVENTO_USUARIO (
	ID_EVENTO_USUARIO SMALLINT AUTO_INCREMENT NOT NULL,
	ID_USUARIO SMALLINT NOT NULL,
	ID_EVENTO SMALLINT NOT NULL,
	ASISTIDO BOOL,
	ROL_EVENTO VARCHAR(50) NOT NULL,
	MARCA_GUARDADO BOOL NOT NULL,
	MARCA_FAVORITO BOOL NOT NULL,
	CONSTRAINT PK_EVENTOS_USUARIOS PRIMARY KEY (ID_EVENTO_USUARIO, ID_USUARIO, ID_EVENTO),
	CONSTRAINT EVENTOS_USUARIOS_USUARIOS FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO),
	CONSTRAINT EVENTOS_USUARIOS_EVENTOS FOREIGN KEY (ID_EVENTO) REFERENCES EVENTO (ID_EVENTO)
);


CREATE TABLE SESION (
	ID_SESION SMALLINT NOT NULL PRIMARY KEY,
	ID_USUARIO SMALLINT NOT NULL,
	NOMBRE_USUARIO VARCHAR(25) NOT NULL,
	DISPOSITIVO VARCHAR(300) NOT NULL,
	CONSTRAINT SESIONES_USUARIOS FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);

CREATE TABLE LOG (
	ID_LOG SMALLINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	ID_USUARIO SMALLINT NOT NULL,
	NOMBRE_USUARIO VARCHAR(25) NOT NULL,
	FECHA DATETIME NOT NULL,
	CATEGORIA VARCHAR(50) NOT NULL,
	DESCRIPCION VARCHAR(100) NOT NULL
);

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
);

CREATE TABLE COMENTARIO ( 
	ID_COMENTARIO SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	ID_USUARIO SMALLINT NOT NULL, 
	ID_EVENTO SMALLINT NOT NULL,
	FECHA DATE, 
	CONSTRAINT FK_COMENTARIOS_USUARIOS FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID_USUARIO),
	CONSTRAINT FK_COMENTARIOS_EVENTOS FOREIGN KEY (ID_EVENTO) REFERENCES EVENTO(ID_EVENTO)
);
