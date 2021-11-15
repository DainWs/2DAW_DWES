# 1. Clases y objetos
Crea la clase Perro. 

De un perro sabemos su tamaño, raza, color y nombre.

Crea el método `mostrar_propiedades`. Dicho método imprime por ejemplo: “el tamaño del perro es XXX, su color XXXX, su raza XXX y su nombre:XXX.

Guarda la clase perro en un fichero llamado perro.php

Debes de tener en cuenta en tu código que si no existe el archivo se generará un error, por lo tanto debes de incluir este código dentro del correspondiente bloque de excepción.

Crea un objeto de la clase perro llamado labrador y muestra sus propiedades justo después de crearlo

Añade a la clase perro el método speak  que haga hablar al animal.

Crea un segundo objeto llamado caniche.

Crea una librería con varios animales con sus propiedades y métodos.

Para la clase perro crea el método `get_color`, `get_raza`, etc. Y también los correspondientes `set_nombre`,…

Controla los valores que se darán a cada una de las propiedades. Incluye en tu código en tu código las instrucciones necesarias para que, por ejemplo,el nombre del perro sea una cadena de caracteres y no exceda de 21. En caso contrario se debería de dar un mensaje de error

Por último, modifica tu código para que cuando se hagan cambios en una propiedad se tengan en cuenta los posibles errores. Ejemplo:
```php
bool $perro_error_message = $labrador->set_nombre('Luna');

print $perro_error_message ? 'Nombre actualizado correctamente' : 'Nombre no modificado'
```