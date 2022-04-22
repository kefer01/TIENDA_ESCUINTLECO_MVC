<?php

namespace Controllers;

use Model\Categoria;
use Model\Producto;
use Model\Proveedor;
use Model\Cliente;
use MVC\Router;

class VentaController {

    public static function buscar(Router $router) {
        $cliente = new Cliente;

        // Validar ID
        if (isset($_GET['id'])) {
            if ($_GET['id'] === "") {
                return null;
            }
            $id = $_GET['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id > 0) {
                // Obtener los datos del cliente
                $cliente = Cliente::find($id);
                if ($cliente) {
                    $client = get_object_vars($cliente);
                } else {
                    $client = null;
                }

                $router->renderSinVista('ventas/cliente', [
                    'cliente' => $client
                ]);
            }
        }
    }

    public static function buscarProd(Router $router) {
        $producto = new Producto;

        // Validar ID
        if (isset($_GET['id'])) {
            if ($_GET['id'] === "") {
                return null;
            }
            $id = $_GET['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id > 0) {
                // Obtener los datos del Producto
                $producto = Producto::find($id);
                if ($producto) {
                    $product = get_object_vars($producto);
                } else {
                    $product = null;
                }

                $router->renderSinVista('ventas/producto', [
                    'producto' => $product
                ]);
            }
        }
    }

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

        $router->render('ventas/nueva_venta', [
            'cliente' => $cliente,
            'errores' => $errores
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
