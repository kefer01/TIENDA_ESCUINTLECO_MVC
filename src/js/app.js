document.addEventListener('DOMContentLoaded', function() {
    buscarCliente();
    buscarProducto()
});

function buscarCliente() {
    document.querySelector('#nit').addEventListener("keyup", () => {
        // let valor = document.querySelector('#nit').value;
        let valor = nit.value;
        if (valor != '') {
            fetch("/ventas/cliente?id=" + valor).then(res => {
                if (!res.ok) {
                    throw new Error('No hay respuesta');
                } else {
                    return res.json();
                }
            }).then(datos => {
                if (datos == '') {
                    var boton = document.querySelector('#nuevo_cliente');
                    boton.classList.remove('ocultar');
                    console.log('es nulo');
                    document.querySelector('#nombre').value = "";
                    document.querySelector('#telefono').value = "";
                    document.querySelector('#correo').value = "";
                    document.querySelector('#direccion').value = "";
                } else {
                    if (datos.data.id_cliente > 0) {
                        var boton = document.querySelector('#nuevo_cliente');
                        boton.classList.add('ocultar');
                        let nombreCompleto = datos.data.nom_cliente + ' ' + datos.data.nom2_cliente + ' ' + datos.data.ape_cliente + ' ' + datos.data.ape2_cliente;
                        document.querySelector('#nombre').value = nombreCompleto;
                        document.querySelector('#telefono').value = datos.data.telefono;
                        document.querySelector('#correo').value = datos.data.correo;
                        document.querySelector('#direccion').value = datos.data.direccion;

                    }
                }
            }).catch(error => {
                console.error('Ocurrio un error ' + error);
            });
        } else {
            var boton = document.querySelector('#nuevo_cliente');
            boton.classList.remove('ocultar');
            document.querySelector('#nombre').value = "";
            document.querySelector('#telefono').value = "";
            document.querySelector('#correo').value = "";
            document.querySelector('#direccion').value = "";
        }

    });

};

function buscarProducto() {
    document.querySelector('#cod_prod').addEventListener("keyup", () => {
        let codigo = cod_prod.value;
        if (codigo != '') {
            fetch("/ventas/producto?id=" + codigo).then(res => {
                if (!res.ok) {
                    throw new Error('No hay respuesta');
                } else {
                    return res.json();
                }
            }).then(datos => {
                if (datos == '') {
                    console.log('es nulo');
                    document.getElementById('nombre_prod').innerHTML = "";
                    document.getElementById('descripcion_prod').innerHTML = "";
                    document.getElementById('stock_prod').innerHTML = "";
                    document.getElementById('cantidad_prod').innerHTML = "0";
                    document.getElementById('precio_prod').innerHTML = "0.00";
                } else {
                    if (datos.data.id_prod > 0) {
                        document.getElementById('nombre_prod').innerHTML = datos.data.nombre_prod;
                        document.getElementById('descripcion_prod').innerHTML = datos.data.descripcion;
                        document.getElementById('stock_prod').innerHTML = datos.data.stock;
                        document.getElementById('precio_prod').innerHTML = datos.data.precio;
                    }
                }
            }).catch(error => {
                console.error('Ocurrio un error ' + error);
            });
        } else {
            document.getElementById('nombre_prod').innerHTML = "";
            document.getElementById('descripcion_prod').innerHTML = "";
            document.getElementById('stock_prod').innerHTML = "";
            document.getElementById('cantidad_prod').innerHTML = "0";
            document.getElementById('precio_prod').innerHTML = "0.00";
        }

    });

};