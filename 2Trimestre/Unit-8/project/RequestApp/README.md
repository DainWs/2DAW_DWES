# Request Application project
MENSAJE IMPORTANTE!!!!
La base de datos se cambio, se añadio el campo `enventa` de tipo `boolean` para indicar si un producto se esta vendiendo o no, esto es utilizado para cuando deseamos borrar un producto.

## Instrucciones
 1. Creación base de datos

Para la creacion de la base de datos, se ejecutaran los archivos en `./sql/` en el siguiente orden:
    1.- SQLSentences.sql
    2.- SQLMyUser.sql [Opcional]
    3.- SQLInserts.sql

 2. Una vez todo se haya creado, continuamos con la configuracion del entorno:

 El entorno lo podras configurar en el .htaccess, esto es importante!!!, en principio, si vas a usar el usuario root, no tienes que cambiar nada, pero si vas a usar otro usuario, tienes que cambiar el usuario y la contraseña:
```ini
#The user of the database
SetEnv DB_USER '<tu usuario va aqui>'

#The password of the database
SetEnv DB_PASSWORD '<la contraseña va aqui>'
```
 3. despues de esto ya deberias poder comenzar.

## Contraseñas
Las contraseñas de todos los usuarios de la base de datos insertados en `SQLInserts.sql` es `prueba`.

## Libraries
The used libraries of this project are:
- monolog/monolog (2.3.5)
- phpmailer/phpmailer (^6.5)

## Lo pedido
Se desea crear una aplicación para el Departamento de pedidos de la empresa XXXXX.
La aplicación debe permitir:
- [X] Consultar categorías 
- [X] Crear categorías para usuarios administradores
- [X] Consultar productos
- [X] Crear, editar y borrar productos para usuarios administradores
- [X] Añadir una o más unidades de un producto al pedido
- [X] Consultar el pedido del carrito y eliminar productos de este.
- [X] Realizar el pedido, introduciéndolo en la base de datos y enviando correo.

Para acceder a la aplicación será necesario autentificarse.
De cada categoría se guarda su código y su nombre. 

De los productos, su código, nombre, descripción, precio, stock, oferta, fecha, imagen y la categoría a la 
que pertenecen. Cada producto pertenece a una categoría.

De los pedidos se conoce su código, la dirección, provincia, localidad, coste, estado, fecha y hora. Un 
pedido constará de una o varias líneas de pedido. De cada una de ellas se almacena un identificador, las 
unidades, el código del producto y el código del pedido

### Project Structure
The project structure that i used for this project:
| Type          | Folder            |
|---------------|-------------------|
| Views         | public/           |
| Controllers   | src/controllers/  |
| Models        | src/models/       |
| Services      | src/services/     |
| Database      | sql/              |

css, js, and images are saved in **public/assets**

#### Project URL structure
The url structure followed for requests:
| Url                                | Action                               |
|------------------------------------|--------------------------------------|
| /moveTo/*                          | show a view of public/               |
| /controllerName/method?params      | call a controller method with params |

### Objectives
- [X] Crear una aplicación de pedidos
- [X] Cargar dinámicamente categorías y productos disponibles
- [X] Almacenar pedidos en una base de datos
- [X] Controlar el acceso con una tabla de usuarios
- [X] Enviar correo de confirmación

### Pasos
- [X] Diseña y crea la base de datos
- [X] Estructura de directorios para implementar el MVC
- [X] Crear el archivo autoload.php
- [X] Archivo con constantes
- [X] Controlador frontal
- [X] Conexión a la base de datos
- [X] Registro de usuarios
- [X] Rutas amigables
- [X] Login de usuarios
- [X] Cerrar sesión
- [X] Gestionar categorías
- [X] Gestionar productos
- [X] Sentencias preparadas
- [X] Desligando el acceso a la base de datos
- [X] Mostrando productos
- [X] Namespaces
- [X] Devolviendo JSON
- [X] El carrito de la compra
- [X] Procesamiento del pedido
- [X] Mis pedidos
- [X] Envío de correo