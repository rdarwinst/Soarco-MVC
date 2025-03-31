<?php

namespace Model;

class Proyecto extends ActiveRecord
{
    protected static $tabla = 'proyecto';

    protected static $columnasDB = ['id', 'titulo', 'subtitulo', 'precio', 'descripcion', 'ubicacion', 'imagen', 'generalidades', 'amenidades', 'casas', 'fecha'];

    public $id;
    public $titulo;
    public $subtitulo;
    public $precio;
    public $descripcion;
    public $ubicacion;
    public $imagen;
    public $generalidades;
    public $amenidades;
    public $casas;
    public $fecha;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->subtitulo = $args['subtitulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->ubicacion = $args['ubicacion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->generalidades = $args['generalidades'] ?? '';
        $this->amenidades = $args['amenidades'] ?? '';
        $this->casas = $args['casas'] ?? '';
        $this->fecha = date('Y/m/d');
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores['titulo'] = "El nombre del proyecto es obligatorio.";
        }
        if (!$this->precio) {
            self::$errores['precio'] = "El precio es obligatorio.";
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores['descripcion'] = "Debe añadir una descripción.";
        }
        if (strlen($this->generalidades) < 50) {
            self::$errores['generalidades'] = "Las generalidades del proyecto son obligatorias.";
        }
        if (strlen($this->amenidades) < 50) {
            self::$errores['amenidades'] = "Las amenidades del proyecto son obligatorias.";
        }
        if (strlen($this->casas) < 50) {
            self::$errores['casas'] = "Proporcione mas información sobre el proyecto (casas).";
        }

        if (!$this->imagen) {
            self::$errores['imagen'] = "La imagen de portada es obligatoria.";
        }


        return self::$errores;
    }
}
