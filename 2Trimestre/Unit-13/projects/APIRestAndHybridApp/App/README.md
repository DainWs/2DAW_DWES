# Hybrid App
**Author:** Jose Antonio Duarte Perez
**Curso:** 2ºDAW

Esta el la *app hibrida* para la gestion de una biblioteca.

## Tools
<hr/>

### PHP
En esta app hibrida se utiliza php para la gestion de la vista, y recursos (como las imagenes/css/js).

Su unica funcionalidad, es devolver un html el cual dependera de un fichero JavaScript para volverse dinamico y navegable.

### JS
JavaScript es el motor principal de esta aplicacion, utilizando **Vue** y **JQuery** conseguimos la vista dinamica que queriamos mediante el lanzamiento de peticiones (**POST**/**GET**/**PUT**/**DELETE**) a nuestra *API*, la cual se encargara de proporcionarnos los datos o permitirnos agregar/eliminar datos de la Base de datos.

## Librerias
<hr/>

- JS:
    - VueJs
    - JQuery
- css:
    - Bootstrap

## Project Structure
<hr/>

The project structure that i used for this project:
| Type          | Folder            |
|---------------|-------------------|
| Views         | public/           |
| Controllers   | src/controllers/  |

css, js, and images are saved in **public/assets**

### Project URL structure
The url structure followed for requests:
| Url                                | Action                               |
|------------------------------------|--------------------------------------|
| /moveTo/*                          | show a view of public/               |

## Requeriments
<hr/>

- [X] Escribe una aplicación híbrida . Puedes implementar algo sencillo, parecido al ejemplo de los terremotos que se ha visto en clase.