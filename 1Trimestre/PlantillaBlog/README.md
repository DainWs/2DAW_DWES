# Project
## Objetivo
El objetivo es crear una aplicación básica para gestionar un blog.

En concreto podremos:
- [X] Registrar usuarios
- [X] Hacer el login de usuarios
- [ ] Editar los datos de los usuarios.
- [X] Crear categorías para nuestro blog
- [ ] Crear entradas para usuarios identificados
- [X] Listar entradas en la página de inicio
- [X] Crear una página de edición de entradas para usuarios logueados.
- [X] Borrar entradas 
- [ ] Además, se añadirá un buscador de entradas a la web

## Crear categorías
- [X] No olvides la conexión a la BBDD
- [X] Recoge los valores del formulario y valida
- [X] Si no hay errores inserta en la tabla categorias el nuevo valor 
- [ ] Redirecciona al index.php

## Crear entradas
- [X] Escribe un formulario para poder guardar las entradas de los usuarios identificados
- [X] Recoge y valida los datos del formulario
- [X] Ten en cuenta que en el formulario hay un campo para elegir la categoría. Recuerda que tienes una función llamada conseguirCategorias() que puedes llamar cuando lo necesites
- [X] Este script puede ser reutilizado después para editar entradas.

## Actualizar datos usuario
- [ ] Crea un formulario para actualizar los datos del usuario.
- [X] Conecta a la base de datos
- [ ] Recoge y valida los datos
- [ ] Realiza una consulta de actualización con los nuevos datos del usuario. Recuerda que el id no se modifica
- [ ] Controla los errores
- [ ] Cuidado con el valor del email. No puede estar repetido en la base de datos. Por tanto, antes de actualizar asegúrate de que no existe y no dejes modificarlo si ya coincide con otro usuario.

## Listar todas las entradas
- [X] Crea una página que te permita listar todas las entradas que tenemos.

## Listar entradas de una categoria
- [X] Crea una página que muestre las entradas de una categoría.
- [X] Podemos crear una función para mostrar sólo la categoría que se pase como parámetro.

## Detalle de la entrada
- [X] Crea una página para mostrar toda la entrada. Recuerda que se han mostrado sólo unas líneas.
- [X] Al pinchar sobre la entrada debemos de mostrar todo el contenido.

## Borrar y editar entradas
- [X] Permite borrar y editar entradas a los usuarios logueados

## Añade un buscador
- [ ] Añade un formulario para buscar dentro de nuestro blog.
- [ ] Usando el título de la entrada buscamos si tenemos una entrada con ese valor. Es decir, que contienen algo de esta información en el título de la entrada

## Dudas
- [X] Crear entradas para usuarios identificados
- [ ] Redirecciona al index.php
- [ ] Recuerda que se han mostrado sólo unas líneas.
- [ ] Permite borrar y editar entradas a los usuarios logueados

## TODO Tasks
- [ ] Add button in CategoriasWidget.php for add new categories.
- [ ] Add too the delete buttom in CategoriasWidget.php for categories.
- [ ] Make the edit view for user data changes

## Final tasks
- [ ] Test form controls.
- [ ] Text insert, update and delete
    - [ ] Users
        - [ ] Insert
        - [ ] Update
        - [ ] Delete
    - [ ] Entries
        - [ ] Insert
        - [ ] Update
        - [ ] Delete
    - [ ] Categories
        - [ ] Insert
        - [ ] Update
        - [ ] Delete