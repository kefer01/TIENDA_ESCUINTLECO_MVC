<?php

if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;

if (!isset($inicio))
    $inicio = false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Escuintleco</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/admin">
                    <h1>Supermercadito UMG</h1>
                </a>
            </div>
            <div class="derecha">
                <nav class="navegacion">

                    <ul class="nav_list">
                        <li class="nav_item">
                            <a href="/ventas/ventas">Ventas</a>
                            <ul class="nav_item_drop">
                                <li><a href="/ventas/nueva_venta">Nueva Venta</a></li>
                                <li><a href="/ventas/ventas">Reporte de Ventas</a></li>
                            </ul>
                        </li>
                        <li class="nav_item">
                            <a href="/clientes/clientes">Clientes</a>
                            <ul class="nav_item_drop">
                                <li><a href="/clientes/crear">Nuevo Cliente</a></li>
                                <li><a href="/clientes/clientes">Lista de Clientes</a></li>
                            </ul>
                        </li>
                        <li class="nav_item"><a href="/productos/productos">Productos</a>
                            <ul class="nav_item_drop">
                                <li><a href="/productos/crear">Nuevo Producto</a></li>
                                <li><a href="/productos/productos">Lista de Productos</a></li>
                            </ul>
                        </li>
                        <li class="nav_item"><a href="/proveedores/proveedores">Proveedores</a>
                            <ul class="nav_item_drop">
                                <li><a href="/proveedores/crear">Nuevo Proveedor</a></li>
                                <li><a href="/proveedores/proveedores">Lista de Proveedores</a></li>
                            </ul>
                        </li>
                        <li class="nav_item"><a href="/usuarios/usuarios">Usuarios</a>
                            <ul class="nav_item_drop">
                                <li><a href="/usuarios/crear">Nuevo Usuario</a></li>
                                <li><a href="/usuarios/usuarios">Lista de Usuarios</a></li>
                            </ul>
                        </li>

                        <?php if ($auth) : ?>
                            <li class="nav_item"> <a href="/logout">Cerrar Sesión</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
            <!--.barra-->

            <?php if ($inicio) {
                echo "<h1 data-cy='heading-sitio'>Venta de Casas y Departamentos Exclusivos de Lujo</h1> ";
            } ?>
        </div>
    </header>


    <?php echo $contenido; ?>


    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">

        </div>
        <p data-cy="copyright" class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="/build/js/bundle.min.js"></script>
</body>

</html>