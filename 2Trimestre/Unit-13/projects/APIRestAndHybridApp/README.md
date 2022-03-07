# API REST y aplicación hibrida
**Author:** Jose Antonio Duarte Perez
**Curso:** 2ºDAW

Esto es una API Rest y una aplicación hibrida creada para la gestion de una biblioteca.

**¡¡IMPORTANTE!!** Podras encontrar la *Api Rest* dentro del directorio *Api*, y la *Hybrid App* dentro del directorio *App*.

## Instrucciones
<hr/>

 1. Creación base de datos

Para la creacion de la base de datos, se ejecutaran los archivos en `./sql/` en el siguiente orden:
    1.- SQLSentences.sql
    2.- SQLMyUser.sql [Opcional]
    3.- SQLInserts.sql

 2. Una vez todo se haya creado, continuamos con la configuracion del entorno:

 El **entorno que podras configurar, sera solo el de la API**, y lo podras hacer configurando el .htaccess, esto es importante!!!, en principio, si vas a usar el usuario root, no tienes que cambiar nada, pero si vas a usar otro usuario, tienes que cambiar el usuario y la contraseña:
```ini
#The user of the database
SetEnv DB_USER '<tu usuario va aqui>'

#The password of the database
SetEnv DB_PASSWORD '<la contraseña va aqui>'
```
 3. despues de esto ya deberias poder comenzar.

**IMPORTANTE** Para Acceder a la pagina web, no es necesario entrar en `.../APIRestAndHybridApp.../App/` conque accedas a `.../APIRestAndHybridApp.../` ya debería ser suficiente.

## Project Structure
<hr/>

The project structure that i used for this project:
| Type          | Folder            |
|---------------|-------------------|
| Api Rest      | Api/              |
| Hybrid App    | App/              |

## Requeriments
<hr/>

- [X] Implementa una API REST en PHP que nos permita intercambiar datos entre el frontend y el backend. Se puede usar reutilizar código de alguno de los ejercicios realizados en clase, por ejemplo podemos usar el  ejercicio Clínica para escribir una API REST que nos devuelva como un objeto JSON la lista de los doctores. 
- [X] Escribe una aplicación híbrida . Puedes implementar algo sencillo, parecido al ejemplo de los terremotos que se ha visto en clase.