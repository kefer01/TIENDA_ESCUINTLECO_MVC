<?php

namespace Model;

use PDO;


class Admin extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'usuario';
    protected static $columnasDB = [
        'id_usuario', 'nom_usuario', 'nom2_usuario',
        'ape_usuario', 'ape2_usuario', 'telefono', 'correo', 'direccion', 'id_tipo', 'password'
    ];

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

    public function __construct($args = []) {
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

    public function validar() {
        if (!$this->correo) {
            self::$errores[] = 'El correo es obligatorio';
        }
        if (!$this->password) {
            self::$errores[] = 'El Password es obligatorio';
        }

        return self::$errores;
    }

    public function existeUsuario() {
        // Revisar si un usuario existe o no
        $query = "EXEC sp_existeUsuario '";
        $query .= $this->correo;
        $query .= "'";
        $resultado = self::$db->query($query);
        if (!$resultado->rowCount()) {
            self::$errores[] = 'El usuario no existe';
            return;
        }
        return $resultado;
    }

    public function comprobarPassword($resultado) {
        $usuario = $resultado->fetch(PDO::FETCH_OBJ);
        $autenticado = password_verify($this->password, $usuario->password);
        if (!$autenticado) {
            self::$errores[] = 'El Password es Incorrecto';
            return;
        }
        return $autenticado;
    }

    public function autenticar() {
        session_start();

        // Llenar el arreglo de session
        $_SESSION['usuario'] = $this->correo;
        $_SESSION['nombre'] = $this->nom_usuario . ' ' . $this->nom2_usuario . ' ' . $this->ape_usuario;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}
