<fieldset>
    <legend>Información Principal</legend>

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="usuario[nom_usuario]" placeholder="Nombre" value="<?php echo s($user->nom_usuario); ?>">

    <label for="segundo_nombre">Segundo Nombre</label>
    <input type="text" id="segundo_nombre" name="usuario[nom2_usuario]" placeholder="Segundo Nombre" value="<?php echo s($user->nom2_usuario); ?>">


    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="usuario[ape_usuario]" placeholder="Apellido" value="<?php echo s($user->ape_usuario); ?>">

    <label for="segundo_apellido">Segundo Apellido</label>
    <input type="text" id="segundo_apellido" name="usuario[ape2_usuario]" placeholder="Segundo Apellido" value="<?php echo s($user->ape2_usuario); ?>">

</fieldset>

<fieldset>
    <legend>Información Extra</legend>
    <label for="telefono">Teléfono</label>
    <input type="text" id="telefono" name="usuario[telefono]" placeholder="Télefono" value="<?php echo s($user->telefono); ?>">

    <label for="correo">Correo</label>
    <input type="text" id="correo" name="usuario[correo]" placeholder="Correo" value="<?php echo s($user->correo); ?>">

    <label for="direccion">Dirección</label>
    <input type="text" id="direccion" name="usuario[direccion]" placeholder="Dirección" value="<?php echo s($user->direccion); ?>">

    <label for="id_tipo">Tipo de Usuario</label>
    <input type="text" id="id_tipo" name="usuario[id_tipo]" placeholder="Tipo de usuario" value="<?php echo s($user->id_tipo); ?>">

    <label for="password">Contraseña</label>
    <input type="password" id="password" name="usuario[password]" placeholder="Contraseña" value="">

</fieldset>