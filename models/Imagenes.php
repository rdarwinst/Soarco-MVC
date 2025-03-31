<?php


namespace Model;


class Imagenes extends ActiveRecord
{
    protected static $tabla = 'imagenes_proyecto';
    protected static $columnasDB = ['id', 'tipo', 'imagen', 'proyecto_id'];

    public $id;
    public $tipo;
    public $imagen;
    public $proyecto_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->tipo = $args['tipo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->proyecto_id = $args['proyecto_id'] ?? '';
    }

    public function validar()
    {
        if (!$this->proyecto_id) {
            self::$errores['proyecto'] = '¡Debe seleccionar un proyecto!';
        }

        if (!$this->tipo) {
            self::$errores['categoria'] = '¡Debe elegir una categoria!';
        }
        if (!$this->imagen) {
            self::$errores['imagen'] = '¡Debe elegir una categoria!';
        }

        return self::$errores;
    }

    public static function where($columna, $valor, $andCond = null, $andValor = null)
    {
        $query = "SELECT * FROM " . static::$tabla;
        $query .= " WHERE {$columna} = '{$valor}'";
        if ($andCond !== null && $andValor !== null) {
            $query .= " AND " . self::$db->escape_string($andCond) . " =' " . self::$db->escape_string($andValor) . " '";
        }
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
}
