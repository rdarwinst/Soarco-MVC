<?php

namespace Model;

class Admin extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'usuario', 'email', 'password'];

    public $id;
    public $nombre;
    public $apellido;
    public $usuario;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->usuario = $args['usuario'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar()
    {
        if (!$this->email) {
            self::$errores['email'] = 'Debes ingresar tu email para iniciar sesión.';
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$errores['email'] = 'Debes ingresar una direccion de email válida.';
        }
        if (!$this->password) {
            self::$errores['password'] = 'Debes introducir tu contraseña.';
        }

        return self::$errores;
    }

    public function existeUsuario()
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if (!$resultado->num_rows) {
            self::$errores['email'] = '¡El email escrito no existe!';
            return;
        }
        return $resultado;
    }

    public function comprobarPassword($resultado)
    {
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify($this->password, $usuario->password);

        if (!$autenticado) {
            self::$errores['password'] = 'El password es incorrecto.';
        }
        return $autenticado;
    }

    public function autenticar()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();      

            $_SESSION['email'] = $this->email;

            $_SESSION['login'] = true;

            header('Location: /admin');
            exit;
        }
    }
}
