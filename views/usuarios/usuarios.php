<main class="contenedor seccion">
    <h1>Administrador de Usuarios</h1>




    <a href="/usuarios/crear" class="boton boton-verde">Nuevo Usuario</a>
    <H2>Usuarios</H2>
    <table class="tablas">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Mostrar los Resultados -->
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td data-label="ID Usuario"><?php echo $usuario->id_usuario ?></td>
                    <td data-label="Nombre"><?php echo $usuario->nom_usuario . ' ' . $usuario->nom2_usuario . ' ' . $usuario->ape_usuario . ' ' . $usuario->ape2_usuario ?></td>
                    <td data-label="Telefono"><?php echo $usuario->telefono ?></td>
                    <td data-label="Correo"><?php echo $usuario->correo ?></td>
                    <td data-label="Correo"><?php echo $usuario->direccion ?></td>
                    <td data-label="Correo"><?php echo $usuario->id_tipo ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/usuarios/eliminar">
                            <input type="hidden" name="id" value="<?php echo $usuario->id_usuario; ?>">
                            <input type="hidden" name="tipo" value="usuarios">
                            <input type="submit" class="boton-rojo-block w-100 boton-tabla" value="Eliminar">
                        </form>
                        <a href="/usuarios/actualizar?id=<?php echo $usuario->id_usuario ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>