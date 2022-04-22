<?php

namespace Controllers;

use Model\Proveedor;
use MVC\Router;

class ProveedorController {

    public static function crear(Router $router) {
        $proveedor = new Proveedor;

        // Arreglo con mensajes de errores
        $errores = Proveedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crear una nueva instancia Proveedor
            $proveedor = new Proveedor($_POST['proveedor']);
            // Validar errores
            $errores = $proveedor->validar();

            if (empty($errores)) {
                $sp = 'sp_InsertarProveedor';
                $proveedor->guardar($sp);
            }
        }

        $router->render('proveedores/crear', [
            'proveedor' => $proveedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        // Validar la URL por ID Válido
        $id = validarORedireccionar('/admin');
        // Obtener los datos del proveedor
        $proveedor = Proveedor::find($id);
        // Arreglo con mensajes de errores
        $errores = Proveedor::getErrores();

        // Ejecutar el codigo despues de que el usuario envio el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // asignar los atributos
            $data = $_POST['proveedor'];

            $proveedor->sincronizar($data);

            // Validacion
            $errores = $proveedor->validar();
            if (empty($errores)) {
                $sp = 'sp_ActualizarProveedor';
                $proveedor->guardar($sp);
            }
        }

        $router->render('proveedores/actualizar', [
            'proveedor' => $proveedor,
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
                    $proveedor = Proveedor::find($id);
                    $sp = 'sp_EliminarProveedor';
                    $proveedor->eliminar($sp);
                }
            }
        }
    }

    public static function todos(Router $router) {
        $proveedores = Proveedor::all();

        $router->render('proveedores/proveedores', [
            'proveedores' => $proveedores
        ]);
    }
}
