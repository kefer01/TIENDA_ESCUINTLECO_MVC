<?php
namespace Model;

class Producto extends ActiveRecord {
    
    protected static $tabla = 'producto';
    protected static $columnasDB = ['id_prod', 'nombre_prod', 'id_categoria', 
    'id_prov', 'stock', 'precio', 'descripcion'];

    public $id_prod;
    public $nombre_prod;
    public $id_categoria; 
    public $id_prov;
    public $stock;
    public $precio;
    public $descripcion;

    public function __construct($args = [])
    {
        $this->id_prod = $args['id_prod'] ?? null;
        $this->nombre_prod = $args['nombre_prod'] ?? '';
        $this->id_categoria = $args['id_categoria'] ?? ''; 
        $this->id_prov = $args['id_prov'] ?? '';
        $this->stock = $args['stock'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
    }

    public function guardar($storeProcedure) {
        if (!is_null($this->id_prod)) {
            // Actualizar o Update
            echo "Hay que ir a actualizar";
            $this->actualizar($storeProcedure);
        } else {
            // Insertar o Insert
            echo "Hay que ir a crear";
            $this->crear($storeProcedure);
        }
    }

    public function validar(){
        if (!$this->nombre_prod) {
            self::$errores[] = 'El nombre es obligatorio';
        }
        if (!$this->id_categoria) {
            self::$errores[] = 'La Categoria es obligatoria';
        }
        if (!$this->id_prov) {
            self::$errores[] = 'El Proveedor es obligatorio';
        }
        if (!$this->stock) {
            self::$errores[] = 'El Stock es obligatorio';
        }
        if (!$this->precio) {
            self::$errores[] = 'El Precio es obligatorio';
        }
        if (!$this->descripcion) {
            self::$errores[] = 'La descripción es obligatorio';
        }

        return self::$errores;
    }
}