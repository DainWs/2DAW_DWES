# Rest API
**Author:** Jose Antonio Duarte Perez
**Curso:** 2ºDAW

Esta el la *Rest Api* para la gestion de una biblioteca.

## Tools
<hr/>

### PHP
Utilizamos php para el control de peticiones (**POST**/**GET**/**PUT**/**DELETE**) y saber que hacer en cada caso para cada tipo de peticion, permitiendo asi *crear/borrar/consultar* datos de la base de datos.

**¡¡IMPORTANTE!!** Todos los datos consultados/respuestas recividas al realizar una accion son tratadas y enviadas en formato **JSON**.

## Project Structure
<hr/>

The project structure that i used for this project:
| Type          | Folder            |
|---------------|-------------------|
| Controllers   | src/controllers/  |
| Servicios     | src/services      |
| Modelos       | src/models        |

### Project URL structure
The url structure followed for requests:
| Url                                | Action                               |
|------------------------------------|--------------------------------------|
| /{Controlador}/{metodoPublico}     | Execute and action                   |

## Requeriments
<hr/>

- [X] Implementa una API REST en PHP que nos permita intercambiar datos entre el frontend y el backend. Se puede usar reutilizar código de alguno de los ejercicios realizados en clase, por ejemplo podemos usar el  ejercicio Clínica para escribir una API REST que nos devuelva como un objeto JSON la lista de los doctores. 