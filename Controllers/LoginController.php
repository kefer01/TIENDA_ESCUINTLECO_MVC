<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;
use PDO;

class LoginController {

    public static function index(Router $router) {
        $errores = [];
        $router->render('/auth/login', ['errores' => $errores]);
    }

    public static function admin(Router $router) {
        //Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;
        $router->render('/admin', [
            'resultado' => $resultado
        ]);
    }

    public static function login(Router $router) {
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth = new Admin($_POST);


            $errores = $auth->validar();
            if (empty($errores)) {
                $user = $auth->existeUsuario();
                $ejemplo = $user->fetch(PDO::FETCH_OBJ);
                $auth->nom_usuario = $ejemplo->nom_usuario;
                $auth->nom2_usuario = $ejemplo->nom2_usuario;
                $auth->ape_usuario = $ejemplo->ape_usuario;
                $auth->ape2_usuario = $ejemplo->ape2_usuario;
                // Verificar si el usuario existe
                $resultado = $auth->existeUsuario();
                if (!$resultado) {
                    $errores = Admin::getErrores();
                } else {
                    // Verificar el password
                    $autenticado = $auth->comprobarPassword($resultado);
                    if ($autenticado) {
                        // Autenticar al usuario
                        $auth->autenticar();
                    } else {
                        // Password incorrecto (mensaje de error)
                        $errores = Admin::getErrores();
                    }
                }
            }
        }
        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}
