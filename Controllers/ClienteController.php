<?php

namespace Controllers;

use Model\Cliente;
use MVC\Router;

class ClienteController {

    public static function crear(Router $router) {
        $cliente = new Cliente;

        // Arreglo con mensajes de errores
        $errores = Cliente::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crear una nueva instancia cliente
            $cliente = new Cliente($_POST['cliente']);
            // Validar errores
            $errores = $cliente->validar();

            if (empty($errores)) {
                $sp = 'sp_InsertarCliente';
                $cliente->guardar($sp);
            }
        }

        $router->render('clientes/crear', [
            'cliente' => $cliente,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        // Validar la URL por ID válido
        $id = validarORedireccionar('/admin');
        // Obtener los datos del cliente
        $cliente = Cliente::find($id);
        // Arreglo con mensajes de errores
        $errores = Cliente::getErrores();

        // Ejecutar el codigo despues de que usuario envio el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los atributos
            $data = $_POST['cliente'];

            $cliente->sincronizar($data);

            // Validacion
            $errores = $cliente->validar();

            if (empty($errores)) {
                $sp = 'sp_ActualizarCliente';
                $cliente->guardar($sp);
            }
        }

        $router->render('/clientes/actualizar', [
            'cliente' => $cliente,
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
                    $client = Cliente::find($id);
                    $sp = 'sp_EliminarCliente';
                    $client->eliminar($sp);
                }
            }
        }
    }

    public static function todos(Router $router) {
        $clientes = Cliente::all();

        $router->render('clientes/clientes', [
            'clientes' => $clientes
        ]);
    }
}
