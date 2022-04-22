<?php

namespace Model;

use PDO;

class ActiveRecord {
    // Base de datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    // Errores o validaciones
    protected static $errores = [];

    // Definir la conexion a la BD
    public static function setDB($database) {
        self::$db = $database;
    }


    // CREATE - INSERTAR 
    public function crear($storeProcedure) {
        $atributos = $this->atributosCrear();
        $query = "EXEC " . $storeProcedure . " '";
        $query .= join("', '", array_values($atributos));
        $query .= "'";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location: /admin?resultado=1');
        }
    }
    // READ - LEER
    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    // UPDATE - ACTUALIZAR
    public function actualizar($storeProcedure) {
        $atributos = $this;
        //Pasando el Objeto atributos a array 
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[$key] = $value;
        }
        $query = "EXEC " . $storeProcedure . " '";
        $query .= join("', '", array_values($valores));
        $query .= "'";

        $resultado = self::$db->query($query);
        if ($resultado) {
            // Redireccionar al usuario
            header("Location: /admin?resultado=2");
        }
    }
    // DELETE - ELIMINAR
    public function eliminar($storeProcedure) {
        $atri = $this->atributos();
        $s = array_shift($atri);
        $query = "EXEC " . $storeProcedure . " '";
        $query .= $s;
        $query .= "'";
        $resultado = self::$db->query($query);
        if ($resultado) {
            header("Location: /admin?resultado=3");
        }
    }

    public function atributosCrear() {
        $atri = $this->atributos();
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === array_key_first($atri)) continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    public function atributos() {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public static function find($id) {
        // $atributos = $this->atributos();
        // $query = "SELECT * FROM " . static::$tabla . " WHERE " . array_key_first($atributos) . " = {$id}";
        $query = "SELECT * FROM " . static::$tabla . " WHERE " . static::$columnasDB[0] . " = {$id}";
        $resultado = self::consultarSQL($query);
        // echo "<pre>";
        // var_dump($resultado);
        // echo "</pre>";
        return (array_shift($resultado));
    }

    public static function consultarSQL($query) {
        // Consultar la base de datos
        $resultado = self::$db->query($query);
        // Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $array[] = static::crearObjeto($registro);
        }
        // Liberar la memoria
        // $resultado->free();

        // Retornar los resultados
        return $array;
    }

    public static function crearObjeto($registro) {
        $objeto = new static;
        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    // Validacion
    public static function getErrores() {
        return static::$errores;
    }

    public function validar() {
        static::$errores = [];
        return static::$errores;
    }

    public function sincronizar($args = []){
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
