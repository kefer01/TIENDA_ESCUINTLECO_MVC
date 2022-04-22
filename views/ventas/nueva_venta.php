<main class="contenedor seccion">

    <a href="/ventas/ventas" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <section>
        <div>
            <h1>Nueva Venta</h1>
        </div>

        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Generar Venta" class="boton boton-verde">
        </form>
    </section>
</main>