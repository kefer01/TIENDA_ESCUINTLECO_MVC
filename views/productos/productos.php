<main class="contenedor seccion">
    <h1>Administrador de Productos</h1>




    <a href="/productos/crear" class="boton boton-verde">Nuevo Producto</a>
    <H2>Productos</H2>
    <table class="tablas">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Producto</th>
                <th>Categoria</th>
                <th>Proveedor</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Mostrar los Resultados -->
            <?php foreach ($productos as $producto) : ?>
                <tr>
                    <td data-label="ID Proveedor"><?php echo $producto->id_prod ?></td>
                    <td data-label="Nombre"><?php echo $producto->nombre_prod ?></td>
                    <td data-label="Categoria"><?php echo $producto->id_categoria ?></td>
                    <td data-label="Proveedor"><?php echo $producto->id_prov ?></td>
                    <td data-label="Stock"><?php echo $producto->stock ?></td>
                    <td data-label="Precio"><?php echo $producto->precio ?></td>
                    <td data-label="Descripcion"><?php echo $producto->descripcion ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/productos/eliminar">
                            <input type="hidden" name="id" value="<?php echo $producto->id_prod; ?>">
                            <input type="hidden" name="tipo" value="productos">
                            <input type="submit" class="boton-rojo-block w-100 boton-tabla" value="Eliminar">
                        </form>
                        <a href="/productos/actualizar?id=<?php echo $producto->id_prod ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>