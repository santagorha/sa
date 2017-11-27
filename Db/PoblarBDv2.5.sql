/*
	Con este script se pobla la V2.5 de la base de datos teniendo en cuenta el orden y las relaciones de FK de las tablas
*/
USE APPEVENTOS;

INSERT INTO CATEGORIA VALUES 
(1, 'LABORATORIOS'),
(2, 'BIENESTAR'),
(3, 'ASESORIAS'),
(4, 'ACTIVIDADES'),
(5, 'SEMILLEROS'),
(6, 'OTROS');

INSERT INTO INFO VALUES 
(1, '2.5', '2017/10/09', 'ULTIMA VERSION'), 
(2, '1.0', '2017/10/05', 'VERSION ESTABLE');

INSERT INTO CIUDAD VALUES 
(1, 'BOGOTA', 1), 
(2, 'MEDELLIN', 4), 
(3, 'PUERTO CARREÑO', 8);

INSERT INTO FACULTAD VALUES 
(1, 'INGENIERIA Y CIENCIAS BASICAS'), 
(2, 'MERCADEO COMUNICACION Y ARTES'), 
(3, 'CIENCIAS SOCIALES'), 
(4, 'CIENCIAS ADMINISTRATIVAS, ECONOMICAS Y CONTABLES');

INSERT INTO TIPO_USUARIO VALUES 
(1, 'ADMINISTRADOR'), 
(2,'USUARIO ESTANDAR'), 
(3, 'ADMINISTRADOR DE EVENTOS');

INSERT INTO SEDE VALUES 
(1, 'SEDE BOGOTA', 'Calle 57 Nº 3-00 Este', 1, '744 07 40'), 
(2, 'SEDE MEDELLIN', 'Carrera 74 # 52 - 20', 2, '(4) 6048122 Ext:6008/6009');

INSERT INTO CENTRO VALUES 
(1, 'Usaquén Calle 125', 1, 1, 'Cll. 125 No. 7C - 50', 'calle125@poli.edu.co', '(1)7562942 Ext 1014 3173721247'), 
(2, 'Suba PG', 1, 1, 'Cll. 147 No. 101 - 12 Centro Comercial. Fiesta Suba Entrada 1 Piso 1', ' suba2@poligran.edu.co', '(1) 7455555 Ext.1700 314 477 15'), 
(3, 'Portal Norte', 1, 1, 'Cra. 22 No. 161 – 12', 'csuportalnorte@poligran.edu.co', '(1) 6775450 319 365 12 90'), 
(4, 'Country PG', 1, 1, 'Cra. 19 No. 84 - 72', 'country1@poli.edu.co', '(1) 7440740 Ext1420 3134771581'), 
(5, 'Calle 80', 1, 1, 'Cra. 19 No. 84 - 72', 'country1@poli.edu.co', '(1) 7440740 Ext1420 3134771581'), 
(6, 'Calle 170 - Colegio Marroquín Campestre', 1, 1, 'Av. Cra. 7 No. 170B - 54', 'csucalle170s@poligran.edu.co', '(1) 677 05 65 - 311 549 86 75'), 
(7, 'Medellín - Centro', 2, 2, 'Cra. 42 No. 50 - 15 Int. 202 Cra. Córdoba entre las calles Colombia y la Playa', 'medellin2@poligran.edu.co', '(4) 293 5955 - 320 6677952'), 
(8, 'Medellín - Carrera 80', 2, 2, 'Cll. 49F No. 80 - 13 ', 'medellin2@poligran.edu.co', '(4) 293 5955 - 320 6677952'), 
(9, 'Medellín - Barrio Los Colores (PG)', 2, 2, 'Cra. 74 No. 52 - 20', 'lymontoya@poligran.edu.co', '(4) 6040200 Ext.6023 320 476762'), 
(10, 'Bello (PG)', 2, 2, 'Cll. 50 No. 50 - 80 Interior 201 Bello', 'csubelloc@poligran.edu.co', '(4) 456 2094 - 3108570504');

INSERT INTO USUARIO VALUES 
(1, 'DEGUALTEROS', 'DAVID', 'EDUARDO', 'GUALTEROS', 'GUALTERO', 'DEGUALTEROS@POLIGRAN.EDU.CO', '1989/5/15', 1, 1, 'XXX.JPG', 1),
(2, 'jmdiazn', 'JUAN', 'MANUEL', 'DIAZ', 'NUÑEZ', 'jmdiazn@poligran.edu.co', '1992/01/01', 1, 2, 'xx22.JPG', 2),
(3, 'feescobarb', 'FRANCISCO', 'ENRIQUE', 'ESCOBAR', 'BELTRAN', 'feescobarb@poligran.edu.co', '1995-10-5', 1, 2, '123.JPG', 3),
(4, 'amrubior', 'ANGELICA', 'MARIA', 'RUBIO', 'RANGEL', 'amrubior@poligran.edu.co', '1990-5-25', 0, 1, 'abc.JPG', 2);

INSERT INTO EVENTO VALUES
(1, 'ASESORIA MATEMATICAS', '2017/12/7', 'img.JPG', 'TEMAS DE REPASO: ALGEBRA BASICA Y TRIGONOMETRIA', 'DESCRIPCION X', 1, 1, 'SALON 3', 15, '1.5', 3, 2, '2017/10/09', '2017/10/07', 0, now(), '2017/10/09'),
(2, 'ASESORIA PROGRAMACION', '2017/10/10', 'img45.JPG', 'TEMAS DE REPASO: PHP Y SQL', 'DESCRIPCION Y', 3, 2, 'SALON 101', 8, '2.4', 1, 0, '2017/10/09', '2017/10/07', 0, now(), '2017/10/18'),
(3, 'ASESORIA DIBUJO', '2017/8/1', 'img4234343243.JPG', 'TEMAS DE REPASO: TRAZO Y COLOR', 'DESCRIPCION Z', 5, 1, 'SALON DIBUJO', 10, '3', 2, 2, '2017/10/09', '2017/10/07', 0, now(), '2017/10/23');

INSERT INTO LOG VALUES 
(1, 1, 1, '2017/10/9', 'LOGIN', 'INGRESO A APP'),
(2, 3, 3, '2017/7/10', 'EDIT', 'EDICION DE EVENTO'),
(3, 2, 2, '2017/11/1', 'LOGOUT', 'SALIDA DE APP');

INSERT INTO EVENTO_USUARIO VALUES
(1, 4, 1, 0, 'ASISTENTE', 0, 1, 0, now()),
(2, 1, 3, 1, 'ASISTENTE', 1, 1, 0, now()), 
(3, 2, 1, 0, 'ASISTENTE', 1, 0, 0, '2017/01/09'), 
(4, 2, 2, 1, 'ASISTENTE', 0, 0, 0, '2017/05/09'), 
(5, 3, 1, 1, 'ASISTENTE', 1, 1, 0, now());

INSERT INTO COMENTARIO VALUES 
(1, 1, 1, 'MUY BUENO', now()),
(2, 2, 2, 'ME GUSTA', now()),
(3, 3, 3, 'NO SE ENTIENDE', now()),
(4, 4, 3, 'SE VE INTERESANTE', now()),
(5, 3, 2, 'DEBERIA HABER OTRO IGUAL', now()),
(6, 2, 1, 'NO VOLVERIA', now()),
(7, 1, 2, 'ME HA GUSTADO', now());

INSERT INTO NOTIFICACION VALUES 
(30,1,'evento','te invitamos al evento de futbol'),
(31,2,'evento','te invitamos al evento de baloncesto'),
(32,3,'evento','te invitamos al evento de danza'),
(33,4,'evento','te invitamos al evento de guitarra'),
(34,4,'evento','te invitamos al evento de tenis'),
(35,2,'evento','te invitamos al evento de gym');