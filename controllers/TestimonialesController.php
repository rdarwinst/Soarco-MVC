<?php

namespace Controllers;

use Model\Proyecto;
use Model\Testimoniales;
use MVC\Router;

class TestimonialesController
{
    public static function agregar(Router $router)
    {
        $proyectos = Proyecto::all();
        $testimoniales = new Testimoniales;
        $errores = Testimoniales::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $testimoniales = new Testimoniales($_POST['testimonial']);

            $errores = $testimoniales->validar();

            if (empty($errores)) {
                $resultado = $testimoniales->guardar();

                if ($resultado) {
                    header('Location: /admin?success=1');
                    exit;
                }
            }
        }

        $router->render('comentarios/agregar', [
            'testimonio' => $testimoniales,
            'proyectos' => $proyectos,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {

        $id = validarORedireccionar('/admin');

        $proyectos = Proyecto::all();

        $testimonio = Testimoniales::find($id);
        $errores = Testimoniales::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['testimonial'];

            $testimonio->sincronizar($args);

            $errores = $testimonio->validar();

            if (empty($errores)) {

                $resultado = $testimonio->guardar();

                if ($resultado) {
                    header('Location: /admin?success=2');
                    exit;
                }
            }
        }

        $router->render('comentarios/actualizar', [
            'testimonio' => $testimonio,
            'proyectos' => $proyectos
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    if ($tipo === 'testimonial') {
                        $testimonio = Testimoniales::find($id);
                        $testimonio->eliminar();
                    }
                }
            }
        }
    }
}
