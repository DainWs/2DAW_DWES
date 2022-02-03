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