# Request Application project
Se desea crear una aplicación para el Departamento de pedidos de la empresa XXXXX.

La aplicación debe permitir:
- Consultar categorías 
- Crear categorías para usuarios administradores
- Consultar productos
- Crear, editar y borrar productos para usuarios administradores
- Añadir una o más unidades de un producto al pedido
- Consultar el pedido del carrito y eliminar productos de este.
- Realizar el pedido, introduciéndolo en la base de datos y enviando correo.

Para acceder a la aplicación será necesario autentificarse.
De cada categoría se guarda su código y su nombre. 

De los productos, su código, nombre, descripción, precio, stock, oferta, fecha, imagen y la categoría a la 
que pertenecen. Cada producto pertenece a una categoría.

De los pedidos se conoce su código, la dirección, provincia, localidad, coste, estado, fecha y hora. Un 
pedido constará de una o varias líneas de pedido. De cada una de ellas se almacena un identificador, las 
unidades, el código del producto y el código del pedido

## Project Structure
The project structure that i used for this project:
| Type          | Folder            |
|---------------|-------------------|
| Views         | public/           |
| Controllers   | src/controllers/  |
| Models        | src/models/       |
| Services      | src/services/     |
| Database      | sql/              |

css, js, and images are saved in **public/assets**
## Objectives
- [ ] Crear una aplicación de pedidos
- [ ] Cargar dinámicamente categorías y productos disponibles
- [ ] Controlar el estado de un pedido 
- [ ] Almacenar pedidos en una base de datos
- [ ] Controlar el acceso con una tabla de usuarios
- [ ] Enviar correo de confirmación

## Pasos
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
- [ ] Gestionar productos
- [X] Sentencias preparadas
- [X] Desligando el acceso a la base de datos
- [X] Mostrando productos
- [X] Namespaces
- [X] Devolviendo JSON
- [ ] El carrito de la compra
- [ ] Procesamiento del pedido
- [ ] Mis pedidos
- [ ] Envío de correo

# Opcional
- [ ] Gestion usuarios