<fieldset>
    <legend>Información Principal</legend>

    <label for="nombre">Nombre Producto</label>
    <input type="text" id="nombre" name="producto[nombre_prod]" placeholder="Nombre" value="<?php echo s($producto->nombre_prod); ?>">

    <label for="categoria">Categoría</label>
    <select name="producto[id_categoria]" id="categoria">
        <option value="">-- Seleccione --</option>
        <?php foreach($categorias as $categoria) : ?>
            <option <?php echo $producto->id_categoria === $categoria->id_categoria ? 'selected' : ''; ?> value="<?php echo s($categoria->id_categoria) ?>"><?php echo s($categoria->nom_categoria); ?></option>
        <?php endforeach; ?>
    </select>

    <label for="proveedor">Proveedor</label>
    <select name="producto[id_prov]" id="proveedor">
        <option value="">-- Seleccione --</option>
        <?php foreach($proveedores as $proveedor) : ?>
            <option <?php echo $producto->id_prov === $proveedor->id_prov ? 'selected' : ''; ?> value="<?php echo s($proveedor->id_prov) ?>"><?php echo s($proveedor->nombre_prov); ?></option>
        <?php endforeach; ?>
    </select>

    <label for="stock">Stock</label>
    <input type="number" id="stock" name="producto[stock]" placeholder="Stock" value="<?php echo s($producto->stock); ?>">

    <label for="precio">Precio</label>
    <input type="number" id="precio" name="producto[precio]" placeholder="Precio" value="<?php echo s($producto->precio); ?>">

    <label for="descripcion">Descripción</label>
    <input type="text" id="descripcion" name="producto[descripcion]" placeholder="Descripción" value="<?php echo s($producto->descripcion); ?>">

</fieldset>