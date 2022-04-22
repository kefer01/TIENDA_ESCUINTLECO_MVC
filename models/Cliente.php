<?php
namespace Model;

class Cliente extends ActiveRecord {
    
    protected static $tabla = 'cliente';
    protected static $columnasDB = ['id_cliente', 'nom_cliente', 'nom2_cliente', 
    'ape_cliente', 'ape2_cliente', 'dpi', 'nit', 'correo', 'telefono', 'direccion'];

    public $id_cliente;
    public $nom_cliente;
    public $nom2_cliente; 
    public $ape_cliente;
    public $ape2_cliente;
    public $dpi;
    public $nit;
    public $correo;
    public $telefono;
    public $direccion;

    public function __construct($args = [])
    {
        $this->id_cliente = $args['id_cliente'] ?? null;
        $this->nom_cliente = $args['nom_cliente'] ?? '';
        $this->nom2_cliente = $args['nom2_cliente'] ?? ''; 
        $this->ape_cliente = $args['ape_cliente'] ?? '';
        $this->ape2_cliente = $args['ape2_cliente'] ?? '';
        $this->dpi = $args['dpi'] ?? '';
        $this->nit = $args['nit'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
    }

    public function guardar($storeProcedure) {
        if (!is_null($this->id_cliente)) {
            // Actualizar o Update
            $this->actualizar($storeProcedure);
        } else {
            // Insertar o Insert
            $this->crear($storeProcedure);
        }
    }

    public function validar(){
        if (!$this->nom_cliente) {
            self::$errores[] = 'El nombre es obligatorio';
        }
        if (!$this->nom2_cliente) {
            self::$errores[] = 'El segundo nombre es obligatorio';
        }
        if (!$this->ape_cliente) {
            self::$errores[] = 'El apellido es obligatorio';
        }
        if (!$this->ape2_cliente) {
            self::$errores[] = 'El segundo apellido es obligatorio';
        }
        if (strlen($this->dpi) <13) {
            self::$errores[] = 'El Numero de DPI es obligatorio y debe tener al menos 13 numeros';
        }
        if (!$this->nit) {
            self::$errores[] = 'El NIT es obligatorio';
        }
        if (strlen($this->telefono) <8) {
            self::$errores[] = 'Teléfono es obligatorio y debe tener al menos 8 numeros';
        }
        if (!$this->correo) {
            self::$errores[] = 'Correo es obligatorio';
        }
        if (!$this->direccion) {
            self::$errores[] = 'Direccion es obligatoria';
        }

        return self::$errores;
    }
}