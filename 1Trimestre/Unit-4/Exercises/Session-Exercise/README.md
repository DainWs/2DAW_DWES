# Práctica de Session – cookies.
1. Crear una **primera página** con formulario de **identificación** (USUARIO/CONTRASEÑA), que realiza validación de usuario en BD y que almacena estado de  usuario identificado en la sesión.(Todas las páginas de la sesión lo reconocen sin tener que comprobar nuevamente la identificación en la base de datos).

La transmisión al servidor  del nombre de usuario/contraseña se realizará encriptada (MD5).
 - **Si usuario verificado:** redirigir a segunda página que permite realizar un pedido de artículos (array de (cod_articulo, cantidad)) Sugerencia: Utilizar como base el  formulario de existencias por tienda.     
 - **si no:** volver a pedir las credenciales.

**Modificación:**  pedir las credenciales  hasta tres veces, y en caso de no conseguir identificarse, bloquear la identificación por dos minutos. 
 - Utilizar cookie para identificar al usuario

El sistema detecta la entrada a la página de pedidos (segunda) sin identificación (fuera de la sesión del usuario identificado) y redirige a página de identificación.

2. Modificar la base de datos con una tabla de **pedido**, con los campos:
	`#idpedido`, `#tienda`, `-fecha`, `-<Fk>usuario`

y el detalle en la tabla **lineapedido** con los campos:
	`#idpedido`, `#tienda`, `#codproducto`, `-cantidad`

Definir una **transacción** que vuelque el contenido del array de pedido (carrito de compra de la sesión) del punto anterior creando un nuevo pedido con sus líneas de pedido correspondiente sobre estas tablas. Confirmar con un mensaje que el pedido ha sido guardado correctamente. En caso de error antes de completar la transacción, deshacer todas las modificaciones efectuadas sobre la base de datos y notificar al usuario.

Realizar todas las acciones mediante funciones que tengan un mínimo acoplamiento con posibilidad de reutilización futura.


3. Implementar un mecanismo de carrito de compra persistente entre sesiones. Un pedido no completado (el carrito) se mantiene abierto en la siguiente conexión del usuario.
 - Añadir un botón de confirmación del pedido (realizará el volcado del carrito al pedido en la base de datos de la pregunta 2). 
 - Añadir un botón de desconexión de la sesión (logout) que la destruya completamente y  redirija al usuario a la pàgina de identificación (login).