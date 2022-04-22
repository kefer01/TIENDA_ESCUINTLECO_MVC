<?php
namespace Model;

class Categoria extends ActiveRecord {
    
    protected static $tabla = 'categoria';
    protected static $columnasDB = ['id_categoria', 'nom_categoria', 'descripcion'];

    public $id_categoria;
    public $nom_categoria;
    public $descripcion; 

    public function __construct($args = [])
    {
        $this->id_categoria = $args['id_categoria'] ?? null;
        $this->nom_categoria = $args['nom_categoria'] ?? '';
        $this->descripcion = $args['descripcion'] ?? ''; 
    }

    public function guardar($storeProcedure) {
        if (!is_null($this->id_categoria)) {
            // Actualizar o Update
            echo "Hay que ir a actualizar";
            $this->actualizar($storeProcedure);
        } else {
            // Insertar o Insert
            echo "Hay que ir a crear";
            $this->crear($storeProcedure);
        }
    }
}