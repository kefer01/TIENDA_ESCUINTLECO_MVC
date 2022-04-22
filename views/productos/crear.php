<main class="contenedor seccion">
    <h1>Crear Producto</h1>

    <a href="/productos/productos" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Crear Producto" class="boton boton-verde">
    </form>
</main>
