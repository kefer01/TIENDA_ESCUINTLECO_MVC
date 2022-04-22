<div class="factura">
    <div class="datos-cliente">
        <div class="action_cliente">
            <h4>Datos del Cliente</h4>
            <a href="/clientes/crear" id="nuevo_cliente" class="boton boton-amarillo">Nuevo Cliente</a>
        </div>
        <form class="formulario form-venta" method="POST" enctype="multipart/form-data">
            <div class="w-30">
                <label for="nit">NIT</label>
                <input type="text" id="nit" name="cliente[nit]" placeholder="NIT" value="<?php echo s($cliente->nit); ?>">
            </div>
            <div class="w-65">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="cliente[nom_cliente]" placeholder="Nombre" value="<?php echo s($cliente->nom_cliente); ?>" disabled>
            </div>
            <div class="w-30">
                <label for="telefono">Teléfono</label>
                <input type="text" id="telefono" name="cliente[telefono]" placeholder="Télefono" value="<?php echo s($cliente->telefono); ?>" disabled>
            </div>
            <div class="w-30">
                <label for="correo">Correo</label>
                <input type="text" id="correo" name="cliente[correo]" placeholder="Correo" value="<?php echo s($cliente->correo); ?>" disabled>
            </div>
            <div class="w-30">
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion" name="cliente[direccion]" placeholder="Dirección" value="<?php echo s($cliente->direccion); ?>" disabled>
            </div>
    </div>

    <div class="datos-venta">
        <h4>Datos de Venta</h4>
        <div class="form-venta">
            <div class="w-50">
                <label for="">Vendedor</label>
                <p><?php echo $_SESSION['nombre']; ?></p>
            </div>
            <div class="w-50">
                <label for="">Acciones</label>
                <div class="acciones_venta">
                    <a href="" class="boton boton-rojo">Anular</a>
                    <a href="" class="boton boton-verde">Procesar</a>
                </div>
            </div>
        </div>
    </div>

    <div class="borde-tabla">
        <table class="tabla-venta">
            <thead>
                <tr class="tabla-titles">
                    <th WIDTH="150px">Código</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Existencia</th>
                    <th>Cantidad</th>
                    <th class="text-right">Precio</th>
                    <th class="text-right">Precio Total</th>
                    <th>Acción</th>
                </tr>
                <tr>
                    <td><input class="input-cod" type="text" id="cod_prod" name="cod_prod"></td>
                    <td class="text-center" id="nombre_prod"></td>
                    <td class="text-center" id="descripcion_prod">-</td>
                    <td class="text-center" id="stock_prod">-</td>
                    <td><input class="input-cod" type="text" id="cantidad_prod" name="cantidad_prod" value="0" min="1"></td>
                    <td id="precio_prod" class="text-right">0.00</td>
                    <td id="precio_total_prod" class="text-right">0.00</td>
                    <td><a href="#" class="boton boton-amarillo">Agregar</a></td>
                </tr>
                <tr class="tabla-titles" >
                    <th>Código</th>
                    <th>Producto</th>
                    <th colspan="2">Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Precio Total</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody id="detalle_venta">
                <tr>
                    <td class="text-center">1</td>
                    <td colspan="2">Margarina</td>
                    <td class="text-center">Margarina</td>
                    <td class="text-center">1</td>
                    <td class="text-right">10.00</td>
                    <td class="text-right">10.00</td>
                    <td><a href="" class="boton boton-rojo">Borrar</a></td>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td colspan="2">Margarina</td>
                    <td class="text-center">Margarina</td>
                    <td class="text-center">1</td>
                    <td class="text-right">10.00</td>
                    <td class="text-right">10.00</td>
                    <td><a href="" class="boton boton-rojo">Borrar</a></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-right">SUBTOTAL Q.</td>
                    <td class="text-right">10.00</td>
                    <td class="text-right"></td>
                </tr>
                <tr>
                    <td colspan="6" class="text-right">IVA Q.</td>
                    <td class="text-right">1.00</td>
                    <td class="text-right"></td>

                </tr>
                <tr>
                    <td colspan="6" class="text-right">DESCUENTOS Q.</td>
                    <td class="text-right">1.00</td>
                    <td class="text-right"></td>

                </tr>
                <tr>
                    <td colspan="6" class="text-right">GRAN TOTAL Q.</td>
                    <td class="text-right">10.00</td>
                    <td class="text-right"></td>
                </tr>      
            </tfoot>
        </table>
    </div>
</div>