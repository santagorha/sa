
INSERT INTO `ciudad`(`ID_CIUDAD`, `CIUDAD`) VALUES (41,Bogota)
INSERT INTO `evento` (`ID_EVENTO`, `NOMBRE_EVENTO`, `FECHA`, `IMAGEN`, `RESUMEN`, `DESCRIPCION`, `CATEGORIA`, `SEDE`, `LUGAR`, `CUPOS`, `DURACION_HORAS`, `FACULTAD`, `CREDITOS`) VALUES ('20', 'Asesoria matemáticas', '2017/10/15', 'xxxxxxxxxx\r\n', 'Asesoria en la materia matemáticas', 'Se resolveran dudas referentes a la materia de matemáticas.\r\n', 'Asesoria', '1', 'Salon 101', '15', '1,5', '81', '0.5')
INSERT INTO `evento_usuario` (`ID_EVENTO_USUARIO`, `ID_USUARIO`, `ID_EVENTO`, `ASISTIDO`, `ROL_EVENTO`, `MARCA`) VALUES ('20', 'jmdiazn', '001', '1', 'asistente', '2')
INSERT INTO `facultad` (`ID_FACULTAD`, `NOMBRE_FACULTAD`) VALUES ('81', 'Ciencias básicas');
INSERT INTO `log` (`ID_LOG`, `ID_USUARIO`, `FECHA`, `CATEGORIA`, `DESCRIPCION`) VALUES ('61', 'jmdiazn', '2017/10/15', 'Autenticación', 'Valida que los datos ingresados que sean correctos');
INSERT INTO `sede` (`ID_SEDE`, `NOMBRE_SEDE`, `DIRECCION`, `CIUDAD`) VALUES ('501', 'Calle 65', 'Ak. 11 #65-30', '41');
INSERT INTO `serie` (`ID_SERIE`, `ID_EVENTO`) VALUES ('200', '001')
INSERT INTO `sesion` (`ID_SESION`, `USUARIO`, `DISPOSITIVO`) VALUES ('31', 'jmdiazn', 'JUANDIAZ\r\n')
INSERT INTO `tipo_usuario` (`ID_TIPO_USUARIO`, `TIPO_USUARIO`) VALUES ('4', 'administrador');
INSERT INTO `usuario` (`ID_USUARIO`, `NOMBRE1`, `NOMBRE2`, `APELLIDO1`, `APELLIDO2`, `CORREO`, `FECHA_NACIMIENTO`, `SEXO`, `CIUDAD`, `FOTO`, `TIPO_USUARIO`) VALUES ('jmdiazn', 'JUAN', 'MANUEL', 'DIAZ', 'NUÑEZ', '\"jmdiazn@poligran.edu.co \"', '1992/01/01', '1', '41', 'xxxxxxxxxxxxx\r\n', '4');