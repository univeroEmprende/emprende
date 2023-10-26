<?php

namespace App;

class Producto extends ActiveRecord {

    // Base DE DATOS
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'nombre', 'precio', 'imagen', 'descripcion', 'categoria_id'];


    public $id;
    public $nombre;
    public $precio;
    public $imagen;
    public $descripcion;
    public $categoria_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->categoria_id = $args['categoria_id'] ?? '';
    }

    public function validar() {

        if(!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre";
        }

        if(!$this->precio) {
            self::$errores[] = 'El Precio es Obligatorio';
        }

        if( strlen( $this->descripcion ) < 50 ) {
            self::$errores[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
        }
        
        if(!$this->categoria_id) {
            self::$errores[] = 'Elige una categoría';
        }

        if(!$this->imagen ) {
            self::$errores[] = 'La Imagen es Obligatoria';
        }

        return self::$errores;
    }

}