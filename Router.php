<?php

namespace MVC;

class Router {
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn) {
        $this->rutasGET[$url] = $fn;
    }
    public function post($url, $fn) {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas() {
        session_start();
        $auth = $_SESSION['login'] ?? null;
        // Arreglo de rutas protegidas...
        $rutasProtegidas = [
            '/usuarios/usuarios', '/usuarios/crear', '/usuarios/actualizar', '/usuarios/eliminar',
            '/clientes/clientes', '/clientes/crear', '/clientes/actualizar', '/clientes/eliminar',
            '/proveedores/proveedores', '/proveedores/crear', '/proveedores/actualizar', '/proveedores/eliminar',
            '/productos/productos', '/productos/crear', '/productos/actualizar', '/productos/eliminar'
        ];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? NULL;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? NULL;
        }

        // Proteger las rutas
        if (in_array($urlActual, $rutasProtegidas) && !$auth) {
            header('Location: /');
        }

        if ($fn) {
            // La URL existe y hay una funcion asociada
            call_user_func($fn, $this);
        } else {
            echo 'Página No Encontrada';
        }
    }

    // Muestra una vista
    public function render($view, $datos = []) {

        foreach ($datos as $key => $value) {
            $$key = $value;
        }
        ob_start(); //Almacenamiento en memoria durante un momento...

        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); //Limpia el Buffer

        include __DIR__ . "/views/layout.php";
    }
    public function renderSinVista($view, $datos = []) {

        foreach ($datos as $key => $value) {
            $$key = $value;
        }
        ob_start(); //Almacenamiento en memoria durante un momento...

        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); //Limpia el Buffer

        include __DIR__ . "/views/layout_vacio.php";
    }
}
