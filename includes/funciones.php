<?php

define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');


function estaAutenticado(){
    session_start();
    if(!$_SESSION['login']){
        header('Location: /');
    }
}

function debuguear($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

function s($html): string {
    $s = htmlspecialchars($html);
    return $s;
}

// Validar tipo de Contenido
function validarTipoContenido($tipo){
    $tipos = ['usuarios', 'clientes', 
    'productos', 'proveedores', ];
    return in_array($tipo, $tipos);
}

//Muestra los mensajes
function mostrarNotificacion($codigo) {
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar(string $url)
{
    // Validar la URL por ID Válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: ${url}");
    }
    return $id;
}