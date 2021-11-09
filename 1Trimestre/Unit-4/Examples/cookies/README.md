# Cookies
Como HTTP es un protocolo sin estado, ninguna petición guarda relación con las anteriores o posteriores y,  surge el problema de identificar a los usuarios. 

Por ejemplo,  cuando deseamos identificarlo para mostrarle un contenido privado, de tal forma que otro usuario no pueda acceder sin más a esa URL privada. 

Como solución surgieron las cookies. 

Las cookies son pequeños ficheros que dejan los servidores web en los ordenadores de los clientes.  

En general se usan para identificar usuarios y personalizar las páginas. Por ejemplo, para identificar a clientes anónimos en nuestro carrito de la compra, mejorar experiencias de otros usuarios, recordar idiomas, almacenar información sobre la fecha de la última visita, etc. 

Cuando un cliente realiza una petición web, envía al servidor las cookies que pudiera tener de este. (Sólo se envían al servidor que las emitió, no a otros). Pero, evidentemente, esto perjudica la privacidad de los usuarios ya que una cookie nos puede rastrear en cada momento. 

Las cookies constan de un nombre y un valor. Además, pueden tener fecha de caducidad. Si no se indica la fecha de caducidad se borran al cerrar el navegador (cookies de sesión) .

Para manejar las cookies se usa la función setcookie()que tiene el siguiente formato:

```php
setcookie(string $name,string $value = "",int $expires = 0,string $path = "",string $domain = "",bool $secure = false,bool $httponly = false): bool
```

(La fecha en la que expira la cookie se especifica como una fecha Unix, es
decir, el número de segundos pasados desde el comienzo de 1970. Normalmente se
usa la función time(), que devuelve la fecha actual y se le suma un periodo de tiempo expresado en segundos)

Las cookies se envían como cabeceras en la peticiones HTTP.

Recuerda que hay que enviar las cabeceras antes de empezar con el cuerpo de la respuesta. Esto implica que hay que utilizar la función `setcookie()` antes de que se empiece a escribir la salida. Si, por ejemplo, intentamos llamar a `setcookie()` después de haber realizado un echo se producirá un error. 

Siempre que utilices cookies en una aplicación web, debes tener en cuenta que, en última instancia, su disponibilidad está controlada por el cliente. Por ejemplo, algunos usuarios deshabilitan las cookies en el navegador porque piensan que la información que almacenan puede suponer un potencial problema de seguridad. O la información que almacenan puede llegar a perderse porque el usuario decide formatear el equipo o simplemente eliminarlas de su sistema. 

