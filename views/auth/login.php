<main class="contenedor seccion contenido-centrado">
    <h1 data-cy="heading-login">Iniciar Sesión</h1>
    <?php foreach ($errores as $error) : ?>

        <div data-cy="alerta-login" class="alerta error"><?php echo $error;?></div>

    <?php endforeach; ?>

    <form data-cy="formulario-login" method="POST" class="formulario" action="/login">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="correo">E-mail</label>
            <input data-cy="input-correo" type="correo" name="correo" placeholder="Tu E-mail" id="correo">

            <label for="password">Password</label>
            <input data-cy="input-password" type="password" name="password" placeholder="Tu Password" id="password">

        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

    </form>
</main>