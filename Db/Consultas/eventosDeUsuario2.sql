/*
	Esta consulta muestra todos los eventos asociados a un usuario segun su nombre de usuario
*/
SELECT * FROM EVENTO 
NATURAL JOIN EVENTO_USUARIO
NATURAL JOIN USUARIO
WHERE NOMBRE_USUARIO = 'degualteros' AND MARCA_AGREGADO = 1;