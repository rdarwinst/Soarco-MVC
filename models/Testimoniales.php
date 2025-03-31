<?php


namespace Model;

class Testimoniales extends ActiveRecord
{
    protected static $tabla = 'testimoniales';

    protected static $columnasDB = ['id', 'nombre', 'apellido', 'testimonio', 'fecha', 'proyecto_id'];

    public $id;
    public $nombre;
    public $apellido;
    public $testimonio;
    public $fecha;
    public $proyecto_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->testimonio = $args['testimonio'] ?? '';
        $this->fecha = date('Y/m/d');
        $this->proyecto_id = $args['proyecto_id'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$errores['nombre'] = 'Debes añadir tu nombre para dejar un comentario.';
        }
        if (!$this->apellido) {
            self::$errores['apellido'] = 'Debes añadir tu apellido para dejar un comentario.';
        }
        if (strlen($this->testimonio) < 50) {
            self::$errores['testimonio'] = 'Tu comentario debe ser de al menos 50 caracteres.';
        }
        if (!$this->proyecto_id) {
            self::$errores['proyecto'] = 'Debes elegir un proyecto para dejar tu opinión.';
        }

        return self::$errores;
    }
}
