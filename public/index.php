<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../includes/app.php';
use Controllers\UsuarioController;
use Controllers\ClienteController;
use Controllers\ProveedorController;
use Controllers\CategoriaController;
use Controllers\LoginController;
use Controllers\ProductoController;
use Controllers\VentaController;
use MVC\Router;

$router = new Router();

// Zona Privada
// Usuarios
$router->get('/usuarios/usuarios', [UsuarioController::class, 'todos']);
$router->get('/usuarios/crear', [UsuarioController::class, 'crear']);
$router->post('/usuarios/crear', [UsuarioController::class, 'crear']);
$router->get('/usuarios/actualizar', [UsuarioController::class, 'actualizar']);
$router->post('/usuarios/actualizar', [UsuarioController::class, 'actualizar']);
$router->post('/usuarios/eliminar', [UsuarioController::class, 'eliminar']);

// Clientes
$router->get('/clientes/clientes', [ClienteController::class, 'todos']);
$router->get('/clientes/crear', [ClienteController::class, 'crear']);
$router->post('/clientes/crear', [ClienteController::class, 'crear']);
$router->get('/clientes/actualizar', [ClienteController::class, 'actualizar']);
$router->post('/clientes/actualizar', [ClienteController::class, 'actualizar']);
$router->post('/clientes/eliminar', [ClienteController::class, 'eliminar']);

// Clientes
$router->get('/proveedores/proveedores', [ProveedorController::class, 'todos']);
$router->get('/proveedores/crear', [ProveedorController::class, 'crear']);
$router->post('/proveedores/crear', [ProveedorController::class, 'crear']);
$router->get('/proveedores/actualizar', [ProveedorController::class, 'actualizar']);
$router->post('/proveedores/actualizar', [ProveedorController::class, 'actualizar']);
$router->post('/proveedores/eliminar', [ProveedorController::class, 'eliminar']);

// Productos
$router->get('/productos/productos', [ProductoController::class, 'todos']);
$router->get('/productos/crear', [ProductoController::class, 'crear']);
$router->post('/productos/crear', [ProductoController::class, 'crear']);
$router->get('/productos/actualizar', [ProductoController::class, 'actualizar']);
$router->post('/productos/actualizar', [ProductoController::class, 'actualizar']);
$router->post('/productos/eliminar', [ProductoController::class, 'eliminar']);

// Ventas
$router->get('/ventas/productos', [VentaController::class, 'todos']);
$router->get('/ventas/nueva_venta', [VentaController::class, 'crear']);
$router->post('/ventas/nueva_venta', [VentaController::class, 'crear']);
$router->get('/ventas/cliente', [VentaController::class, 'buscar']);
$router->post('/ventas/cliente', [VentaController::class, 'buscar']);
$router->get('/ventas/producto', [VentaController::class, 'buscarProd']);
$router->post('/ventas/producto', [VentaController::class, 'buscarProd']);

// Zona Publica y Login
$router->get('/', [LoginController::class, 'index']);
$router->get('/login', [LoginController::class, 'index']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);
$router->get('/admin', [LoginController::class, 'admin']);

$router->comprobarRutas();



$prov = new ProveedorController;
// $prov->crear();
// $prov->actualizar();
// $prov->eliminar();
// $prov->todos();

$cate = new CategoriaController;
// $cate->crear();
// $cate->actualizar();
// $cate->eliminar();
// $cate->todos();

$prod = new ProductoController;
// $prod->crear();
// $prod->actualizar();
// $prod->eliminar();
// $prod->todos();

$auth = new LoginController;
// $auth->login();



