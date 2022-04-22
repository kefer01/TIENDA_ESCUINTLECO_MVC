<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class UsuarioController {

    public static function crear(Router $router) {
        $usuario = new Usuario;

        // Arreglo con mensajes de errores
        $errores = Usuario::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crear una nueva instancia usuario
            $usuario = new Usuario($_POST['usuario']);
            // Validar errores
            $errores = $usuario->validar();

            if (empty($errores)) {
                // Hashear la contraseña
                $passwordHash = password_hash($usuario->password, PASSWORD_DEFAULT);
                // asignar la contraseña a la instancia
                $usuario->password = $passwordHash;
                $sp = 'sp_InsertarUsuario';
                $usuario->guardar($sp);
            }
        }
        $router->render('usuarios/crear', [
            'user' => $usuario,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        // Validar la URL por ID válido
        $id = validarORedireccionar('/admin');
        // Obtener los datos del usuario
        $usuario = Usuario::find($id);
        // Arreglo con mensajes de errores
        $errores = Usuario::getErrores();

        // Ejecutar el codigo despues de que el usuario envio el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los atributos
            $data = $_POST['usuario'];
            // Hashear la contraseña
            $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);
            // asignar la contraseña a la instancia
            $data['password'] = $passwordHash;

            $usuario->sincronizar($data);

            // Validación
            $errores = $usuario->validar();

            if (empty($errores)) {
                $sp = 'sp_ActualizarUsuario';
                $usuario->guardar($sp);
            }
        }
        $router->render('usuarios/actualizar', [
            'user' => $usuario,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    $user = Usuario::find($id);
                    $sp = 'sp_EliminarUsuario';
                    $user->eliminar($sp);
                }
            }
        }
    }

    public static function todos(Router $router) {
        $usuarios = Usuario::all();

        $router->render('usuarios/usuarios', [
            'usuarios' => $usuarios
        ]);
    }
}
