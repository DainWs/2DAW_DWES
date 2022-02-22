# Jose Antonio Duarte Perez - Exam 22-02-2022
**Author:** Jose Antonio Duarte Perez
**Course:** 2DAW
**Date:** 22/02/2022

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

 4. Al finalizar de corregir, puedes ejecutar `SQLDeleteAll.sql` para borrar la base de datos.

## Contraseñas
Las contraseñas de todos los usuarios de la base de datos insertados en `SQLInserts.sql` es `prueba`.

## Libraries
The used libraries of this project are:
- phpmailer/phpmailer (^6.5)

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
| /controllerName/method?params      | call a controller method with params |
|                                    |                                      |
