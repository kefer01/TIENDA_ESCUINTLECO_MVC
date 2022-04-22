<main class="contenedor seccion">
<?php
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) { ?>
            <p class="alerta exito"> <?php echo s($mensaje); ?> </p> <?php
                                                                    }
                                                                }
                                                                        ?>
    <h1>Bienvenidos</h1>
    <h2>Tienda El Escuintleco</h2>
</main>