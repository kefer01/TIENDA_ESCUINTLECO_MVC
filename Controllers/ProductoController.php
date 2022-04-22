<?php

namespace Controllers;

use Model\Categoria;
use Model\Producto;
use Model\Proveedor;
use MVC\Router;

class ProductoController {

    public static function crear(Router $router) {
        $producto = new Producto;
        $proveedores = Proveedor::all();
        $categorias = Categoria::all();

        // Arreglo con mensajes de errores
        $errores = Producto::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crear una nueva instancia de Producto
            $producto = new Producto($_POST['producto']);
            // Validar errores
            $errores = $producto->validar();

            if (empty($errores)) {
                $sp = 'sp_InsertarProducto';
                $producto->guardar($sp);
            }
        }


        $router->render('/productos/crear', [
            'producto' => $producto,
            'errores' => $errores,
            'proveedores' => $proveedores,
            'categorias' => $categorias
        ]);
    }

    public static function actualizar(Router $router) {
        $proveedores = Proveedor::all();
        $categorias = Categoria::all();

        // Validar pla URL por ID Válido
        $id = validarORedireccionar('/admin');
        // Obtener los datos del producto
        $producto = Producto::find($id);
        // Arreglo con mensajes de errores
        $errores = Producto::getErrores();

        // Ejecutar codigo despues de que el usuario envio el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los atributos
            $data = $_POST['producto'];

            $producto->sincronizar($data);

            // Validacion
            $errores = $producto->validar();

            if (empty($errores)) {
                $sp = 'sp_ActualizarProducto';
                $producto->guardar($sp);
            }
        }

        $router->render('/productos/crear', [
            'producto' => $producto,
            'errores' => $errores,
            'proveedores' => $proveedores,
            'categorias' => $categorias
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
                    $producto = Producto::find($id);
                    $sp = 'sp_EliminarProducto';
                    $producto->eliminar($sp);
                }
            }
        }
    }

    public static function todos(Router $router) {
        $productos = Producto::all();

        $router->render('/productos/productos', [
            'productos' => $productos
        ]);
    }
}
