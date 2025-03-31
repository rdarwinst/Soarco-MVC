<?php

namespace Model;

class Equipo extends ActiveRecord
{

    protected static $tabla = 'equipo';

    protected static $columnasDB = ['id', 'nombre', 'apellido', 'cargo', 'correo', 'telefono', 'imagen', 'agregado'];

    public $id;
    public $nombre;
    public $apellido;
    public $cargo;
    public $correo;
    public $telefono;
    public $imagen;
    public $agregado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->cargo = $args['cargo'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->agregado = date('Y/m/d');
    }

    public function validar()
    {

        $regEmail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        $regTel = "/^(\+57|0)?[1-9]\d{9}$/";

        if (!$this->nombre) {
            self::$errores['nombre']  = 'Debe añadir al menos un nombre.';
        }
        if (!$this->apellido) {
            self::$errores['apellido']  = 'Debe añadir al menos un apellido.';
        }
        if (!$this->cargo) {
            self::$errores['cargo']  = 'Debe añadir el cargo de la persona.';
        }
        if (!$this->correo || !preg_match($regEmail, $this->correo)) {
            self::$errores['correo']  = 'Debe añadir una direccion de correo electronico válida.';
        }

        if ($this->telefono) {
            if (!preg_match($regTel, $this->telefono)) {
                self::$errores['telefono'] = 'El número de teléfono debe ser válido.';
            }
        }

        if (!$this->imagen) {
            self::$errores['imagen']  = 'Debe añadir una imagen de la persona.';
        }
        return self::$errores;
    }
}
