<main class="contenedor seccion">
    <h1>Crear Cliente</h1>

    <a href="/clientes/clientes" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Crear Cliente" class="boton boton-verde">
    </form>
</main>
