<?php

namespace Model;

class Clientes extends ActiveRecord
{
    protected static $tabla = 'clientes_potenciales';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'correo', 'telefono', 'proyecto', 'titulo'];

    public $id;
    public $nombre;
    public $apellido;
    public $correo;
    public $telefono;
    public $proyecto;
    public $titulo;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->proyecto = $args['proyecto'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
    }

    public function validar()
    {
        $regEmail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        $regTel = "/^(\+57|0)?[1-9]\d{9}$/";

        if (!$this->nombre) {
            self::$errores['nombre'] = 'Tu nombre es obligatorio para ponernos en contacto.';
        }
        if (!$this->apellido) {
            self::$errores['apellido'] = 'Tu apellido es obligatorio para ponernos en contacto.';
        }
        if (!$this->correo || !preg_match($regEmail, $this->correo)) {
            self::$errores['correo'] = 'Debes ingresar una dirección de email válida.';
        }
        if (!$this->telefono || !preg_match($regTel, $this->telefono)) {
            self::$errores['telefono'] = 'Debes ingresar un número de teléfono válido.';
        }

        return self::$errores;
    }
}
