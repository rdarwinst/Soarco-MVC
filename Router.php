<?php

namespace MVC;

class Router
{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($urlActual, $fn)
    {
        $this->rutasGET[$urlActual] = $fn;
    }

    public function post($urlActual, $fn)
    {
        $this->rutasPOST[$urlActual] = $fn;
    }

    public function comprobarRutas()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $auth = $_SESSION['login'] ?? null;

        $rutasProtegidas = ['/admin', '/proyectos/crear', '/proyectos/imagenes', '/proyectos/actualizar', '/proyectos/eliminar', '/equipo/agregar', '/equipo/actualizar', '/equipo/eliminar', '/comentarios/agregar', '/comentarios/actualizar', '/comentarios/eliminar'];

        $urlActual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if (in_array($urlActual, $rutasProtegidas) && !$auth) {
            header('Location: /');
            exit;
        }

        if ($fn) {
            call_user_func($fn, $this);
        } else {
            header("HTTP/1.0 404 Not Found");
            include __DIR__ . '/views/404.php';
        }
    }

    public function render($view, $datos = [])
    {

        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include __DIR__ . "/views/{$view}.php";

        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }
}
