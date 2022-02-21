<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function Home() {
        $usuarios = [ 'Carlos', 'Javi', 'Jose' ];
        $titulo = 'Vista Usuarios / Lista de Usuarios';
        return view('usuarios')
            ->with('titulo', $titulo)
            ->with('usuarios', $usuarios);
    }
}
