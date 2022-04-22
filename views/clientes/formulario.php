<fieldset>
    <legend>Información Principal</legend>

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="cliente[nom_cliente]" placeholder="Nombre" value="<?php echo s($cliente->nom_cliente); ?>">

    <label for="segundo_nombre">Segundo Nombre</label>
    <input type="text" id="segundo_nombre" name="cliente[nom2_cliente]" placeholder="Segundo Nombre" value="<?php echo s($cliente->nom2_cliente); ?>">


    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="cliente[ape_cliente]" placeholder="Apellido" value="<?php echo s($cliente->ape_cliente); ?>">

    <label for="segundo_apellido">Segundo Apellido</label>
    <input type="text" id="segundo_apellido" name="cliente[ape2_cliente]" placeholder="Segundo Apellido" value="<?php echo s($cliente->ape2_cliente); ?>">

</fieldset>

<fieldset>
    <legend>Información Extra</legend>
    <label for="dpi">DPI</label>
    <input type="number" id="dpi" name="cliente[dpi]" placeholder="DPI" value="<?php echo s($cliente->dpi); ?>">

    <label for="nit">NIT</label>
    <input type="text" id="nit" name="cliente[nit]" placeholder="NIT" value="<?php echo s($cliente->nit); ?>">

    <label for="telefono">Teléfono</label>
    <input type="text" id="telefono" name="cliente[telefono]" placeholder="Télefono" value="<?php echo s($cliente->telefono); ?>">

    <label for="correo">Correo</label>
    <input type="text" id="correo" name="cliente[correo]" placeholder="Correo" value="<?php echo s($cliente->correo); ?>">

    <label for="direccion">Dirección</label>
    <input type="text" id="direccion" name="cliente[direccion]" placeholder="Dirección" value="<?php echo s($cliente->direccion); ?>">

</fieldset>