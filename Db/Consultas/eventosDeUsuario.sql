/*Esta tabla hace la consula mostrando nombre, apellido, evento, fecha
según el ID de usuario en la linea del WHERE (EN ESTE CASO 1).
es decir muestra datos de usuario y los eventos asociados a él
*/

SELECT NOMBRE1 AS NOMBRE, APELLIDO1 AS APELLIDO, NOMBRE_EVENTO AS 'EVENTO', ASISTIDO FROM EVENTO_USUARIO
INNER JOIN USUARIO
ON EVENTO_USUARIO.ID_USUARIO = USUARIO.ID_USUARIO
INNER JOIN EVENTO
ON EVENTO_USUARIO.ID_EVENTO = EVENTO.ID_EVENTO
WHERE USUARIO.ID_USUARIO = 1;