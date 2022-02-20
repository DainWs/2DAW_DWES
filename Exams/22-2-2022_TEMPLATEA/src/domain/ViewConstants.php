<?php

namespace exam\src\domain;

/**
 * This is a 'static' class that contains some constants for Views usage
 */
abstract class ViewConstants {
    const URL = 'url';

    const FORM_ERRORS = 'errors';

    const HAS_SESSION = 'hasSession';
    const SESSION_USER = 'sessionUser';

    const MODEL_USUARIO = 'usuario';
    const MODEL_PRODUCTO = 'producto';
    const MODEL_CATEGORIA = 'categoria';
    const MODEL_CARRITO = 'carrito';

    const LIST_MODEL_USUARIOS = 'listaUsuarios';
    const LIST_MODEL_PRODUCTOS = 'listaProductos';
    const LIST_MODEL_CATEGORIAS = 'listaCategorias';
    const LIST_MODEL_PEDIDOS = 'listaPedidos';
}