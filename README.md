# practicaaplicada20172
Repositorio para el proyecto de práctica aplicada en el 2017-2

## Integración:
1. Comentar código, variables, métodos, parámetros, returns. 
Sugerencia para métodos:
```
/** javascript
* Qué hace el método
*
* @param nombre de paramétro - Descripción
* @returns Descripción 
/
```
2. Las rutas de servicios web agreguelas como constantes en el archivo js: constants.js
3. Las páginas HTML no deben tener head-body-etc, sólo el contenido del body, el content.html es como el "padre" de las páginas
Ejemplo:
``` html
<ons-page id="ejemplo">
    <div>Hello World</div>
</ons-page>  
```
4. Para agregar scripts (a menos que sea de login) agregarlos en el head de content.html. Importa el orden? Generalmente no, excepto que los primeros sean los de onsen, jquery, constants
5. Es mejor manejar un sólo archivo css, onsen recomienda usar el que se encuentra en www/css/style.css. La razón de ello es porque toda las páginas usarán el mismo conjunto de css y js
6. Usar el modelo e interfaz diseñado por Daniel en server, donde se configuran las rutas en index.php y la lógica en el controller creado
7. Use nombres claros y diciente, recuerde que js comparte variables, no usar nombres genéricos (para variables globales) como index, mejor use indexParticipantes o por el estilo
8. Evite dejar código js en el html

## Precondiciones de Software:
1.  Registrarse en GitHub https://github.com (crear una cuenta)
2.  Descargar e instalar GIT desde   https://git-scm.com/downloads
3.  Instalar un editor de texto enriquecido (opcional), opciones sugeridas:
    - Sublime Text 3  https://www.sublimetext.com/3
    - Notepad++  https://notepad-plus-plus.org/download/v7.5.1.html
4.  Descargar e instalar XAMPP desde https://www.apachefriends.org/es/index.html
5.  Descargar e instalar NPM desde:
    https://www.npmjs.com/get-npm?utm_source=house&utm_medium=homepage&utm_campaign=free%20orgs&utm_term=Install%20npm
6.  Descargar Apache Cordova desde https://cordova.apache.org/
7.  Descargar HeidiSQL desde https://www.heidisql.com/
8.  Descargar DIA desde http://dia-installer.de/index.html.es (portable)
