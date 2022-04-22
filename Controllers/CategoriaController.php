<?php

namespace Controllers;

use Model\Categoria;

class CategoriaController {

    public static function crear() {
        $cat = new Categoria;
        $data = array(
            "id_categoria" => null,
            "nom_categoria" => "Carnes",
            "descripcion" => "Carnes Rojas y Blancas"
        );
        $categoria = new Categoria($data);
        $sp = 'sp_InsertarCategoria';
        $categoria->guardar($sp);
    }

    public static function actualizar(){
        $data = array(
            "id_categoria" => '2',
            "nom_categoria" => "Carnes",
            "descripcion" => "Carnes Rojas y Blancas y Pescado"
        );
        $categoria = new Categoria($data);
        $sp = 'sp_ActualizarCategoria';
        $categoria->guardar($sp);
    }

    public static function eliminar()
    {
        $id = '4';
        $categoria = new Categoria;
        $cat = $categoria->find($id);
        $sp = 'sp_EliminarCategoria';
        $cat->eliminar($sp);
    }

    public static function todos()
    {   
        $categorias = new Categoria;
        $categorias->all();
    }
}