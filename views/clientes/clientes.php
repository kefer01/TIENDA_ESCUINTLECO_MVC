<main class="contenedor seccion">
    <h1>Administrador de Clientes</h1>




    <a href="/clientes/crear" class="boton boton-verde">Nuevo Cliente</a>
    <H2>Clientes</H2>
    <table class="tablas">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>DPI</th>
                <th>NIT</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Mostrar los Resultados -->
            <?php foreach ($clientes as $cliente) : ?>
                <tr>
                    <td data-label="ID Cliente"><?php echo $cliente->id_cliente ?></td>
                    <td data-label="Nombre"><?php echo $cliente->nom_cliente . ' ' . $cliente->nom2_cliente . ' ' . $cliente->ape_cliente . ' ' . $cliente->ape2_cliente ?></td>
                    <td data-label="DPI"><?php echo $cliente->dpi ?></td>
                    <td data-label="NIT"><?php echo $cliente->nit ?></td>
                    <td data-label="Telefono"><?php echo $cliente->telefono ?></td>
                    <td data-label="Correo"><?php echo $cliente->correo ?></td>
                    <td data-label="Direccion"><?php echo $cliente->direccion ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/clientes/eliminar">
                            <input type="hidden" name="id" value="<?php echo $cliente->id_cliente; ?>">
                            <input type="hidden" name="tipo" value="clientes">
                            <input type="submit" class="boton-rojo-block w-100 boton-tabla" value="Eliminar">
                        </form>
                        <a href="/clientes/actualizar?id=<?php echo $cliente->id_cliente ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>