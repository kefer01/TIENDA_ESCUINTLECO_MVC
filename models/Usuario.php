<?php
namespace Model;

class Usuario extends ActiveRecord {
    
    protected static $tabla = 'usuario';
    protected static $columnasDB = ['id_usuario', 'nom_usuario', 'nom2_usuario', 
    'ape_usuario', 'ape2_usuario', 'telefono', 'correo', 'direccion', 'id_tipo', 'password'];

    public $id_usuario;
    public $nom_usuario;
    public $nom2_usuario; 
    public $ape_usuario;
    public $ape2_usuario;
    public $telefono;
    public $correo;
    public $direccion;
    public $id_tipo;
    public $password;

    public function __construct($args = [])
    {
        $this->id_usuario = $args['id_usuario'] ?? null;
        $this->nom_usuario = $args['nom_usuario'] ?? '';
        $this->nom2_usuario = $args['nom2_usuario'] ?? ''; 
        $this->ape_usuario = $args['ape_usuario'] ?? '';
        $this->ape2_usuario = $args['ape2_usuario'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->id_tipo = $args['id_tipo'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function guardar($storeProcedure) {
        if (!is_null($this->id_usuario)) {
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
        if (!$this->nom_usuario) {
            self::$errores[] = 'El nombre es obligatorio';
        }
        if (!$this->nom2_usuario) {
            self::$errores[] = 'El segundo nombre es obligatorio';
        }
        if (!$this->ape_usuario) {
            self::$errores[] = 'El apellido es obligatorio';
        }
        if (!$this->ape2_usuario) {
            self::$errores[] = 'El segundo apellido es obligatorio';
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
        if (!$this->id_tipo) {
            self::$errores[] = 'El tipo de usuario es obligatorio';
        }
        if (!$this->password) {
            self::$errores[] = 'El Password es obligatorio';
        }

        return self::$errores;
    }
}