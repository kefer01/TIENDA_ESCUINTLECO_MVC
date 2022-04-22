<fieldset>
    <legend>Información Principal</legend>

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="proveedor[nombre_prov]" placeholder="Nombre" value="<?php echo s($proveedor->nombre_prov); ?>">

    <label for="correo">Correo</label>
    <input type="text" id="correo" name="proveedor[correo_prov]" placeholder="Correo" value="<?php echo s($proveedor->correo_prov); ?>">

    <label for="telefono">Teléfono</label>
    <input type="text" id="telefono" name="proveedor[telefono_prov]" placeholder="Télefono" value="<?php echo s($proveedor->telefono_prov); ?>">

    <label for="direccion">Dirección</label>
    <input type="text" id="direccion" name="proveedor[direccion_prov]" placeholder="Dirección" value="<?php echo s($proveedor->direccion_prov); ?>">

</fieldset>

<fieldset>
    <legend>Información Extra</legend>
    <label for="dpi">DPI</label>
    <input type="number" id="dpi" name="proveedor[dpi]" placeholder="DPI" value="<?php echo s($proveedor->dpi); ?>">

    <label for="nit">NIT</label>
    <input type="text" id="nit" name="proveedor[nit]" placeholder="NIT" value="<?php echo s($proveedor->nit); ?>">

</fieldset>