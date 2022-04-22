<main class="contenedor seccion">
    <h1>Administrador de Proveedores</h1>




    <a href="/proveedores/crear" class="boton boton-verde">Nuevo Proveedor</a>
    <H2>Proveedores</H2>
    <table class="tablas">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Proveedor</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>DPI</th>
                <th>NIT</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Mostrar los Resultados -->
            <?php foreach ($proveedores as $proveedor) : ?>
                <tr>
                    <td data-label="ID Proveedor"><?php echo $proveedor->id_prov ?></td>
                    <td data-label="Nombre"><?php echo $proveedor->nombre_prov ?></td>
                    <td data-label="Correo"><?php echo $proveedor->correo_prov ?></td>
                    <td data-label="Telefono"><?php echo $proveedor->telefono_prov ?></td>
                    <td data-label="Direccion"><?php echo $proveedor->direccion_prov ?></td>
                    <td data-label="DPI"><?php echo $proveedor->dpi ?></td>
                    <td data-label="NIT"><?php echo $proveedor->nit ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/proveedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $proveedor->id_prov; ?>">
                            <input type="hidden" name="tipo" value="proveedores">
                            <input type="submit" class="boton-rojo-block w-100 boton-tabla" value="Eliminar">
                        </form>
                        <a href="/proveedores/actualizar?id=<?php echo $proveedor->id_prov ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>