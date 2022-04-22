<?php
namespace Model;

class Proveedor extends ActiveRecord {
    
    protected static $tabla = 'proveedor';
    protected static $columnasDB = ['id_prov', 'nombre_prov', 'correo_prov', 'telefono_prov', 'direccion_prov', 'dpi', 'nit'];

    public $id_prov;
    public $nombre_prov;
    public $correo_prov;
    public $telefono_prov;
    public $direccion_prov;
    public $dpi;
    public $nit;

    public function __construct($args = [])
    {
        $this->id_prov = $args['id_prov'] ?? null;
        $this->nombre_prov = $args['nombre_prov'] ?? '';
        $this->correo_prov = $args['correo_prov'] ?? '';
        $this->telefono_prov = $args['telefono_prov'] ?? '';
        $this->direccion_prov = $args['direccion_prov'] ?? '';
        $this->dpi = $args['dpi'] ?? '';
        $this->nit = $args['nit'] ?? '';
    }

    public function guardar($storeProcedure) {
        if (!is_null($this->id_prov)) {
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
        if (!$this->nombre_prov) {
            self::$errores[] = 'El nombre es obligatorio';
        }
        if (!$this->correo_prov) {
            self::$errores[] = 'Correo es obligatorio';
        }
        if (strlen($this->telefono_prov) <8) {
            self::$errores[] = 'Teléfono es obligatorio y debe tener al menos 8 numeros';
        }
        if (!$this->direccion_prov) {
            self::$errores[] = 'Direccion es obligatoria';
        }

        return self::$errores;
    }
}