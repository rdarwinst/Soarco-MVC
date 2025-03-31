<?php

namespace Controllers;

use MVC\Router;
use Model\Equipo;
use Model\Clientes;
use Model\Proyecto;
use Model\Testimoniales;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;
use Model\Imagenes;

class ProyectoController
{
    public static function index(Router $router)
    {
        $proyectos = Proyecto::all();
        $personas = Equipo::all();
        $testimonios = Testimoniales::all();
        $clientes = Clientes::all();

        $router->render('proyectos/admin', [
            'proyectos' => $proyectos,
            'personas' => $personas,
            'testimonios' => $testimonios,
            'clientes' => $clientes
        ]);
    }

    public static function crear(Router $router)
    {
        $proyecto = new Proyecto;
        $errores = Proyecto::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $proyecto = new Proyecto($_POST['proyecto']);

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['proyecto']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $imagen = $manager->read($_FILES['proyecto']['tmp_name']['imagen'])->coverDown(1200, 720);
                $proyecto->setImagen($nombreImagen);
            }

            $errores = $proyecto->validar();

            if (empty($errores)) {

                if (!is_dir(IMAGES_URL)) {
                    mkdir(IMAGES_URL, 0755, true);
                }

                $imagen->save(IMAGES_URL . $nombreImagen);

                $resultado = $proyecto->guardar();

                if ($resultado) {
                    header('Location: /admin?success=1');
                    exit;
                }
            }
        }

        $router->render('proyectos/crear', [
            'proyecto' => $proyecto,
            'errores' => $errores,
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');
        $proyecto = Proyecto::find($id);
        $errores = Proyecto::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['proyecto'];

            $proyecto->sincronizar($args);

            $errores = $proyecto->validar();

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['proyecto']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $imagen = $manager->read($_FILES['proyecto']['tmp_name']['imagen'])->coverDown(1200, 720);
                $proyecto->setImagen($nombreImagen);
            }

            if (empty($errores)) {

                if ($_FILES['proyecto']['tmp_name']['imagen']) {
                    $imagen->save(IMAGES_URL . $nombreImagen);
                }

                $resultado = $proyecto->guardar();

                if ($resultado) {
                    header('Location: /admin?success=2');
                    exit;
                }
            }
        }

        $router->render(
            '/proyectos/actualizar',
            [
                'proyecto' => $proyecto,
                'errores' => $errores
            ]
        );
    }

    public static function imagenes(Router $router)
    {
        $proyectos = Proyecto::all();
        $imagenes = new Imagenes;
        $errores = Imagenes::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $imagenes = new Imagenes($_POST);

            $imgs = $_FILES['imagen']['tmp_name'];

            foreach ($imgs as $img) {
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                $mananer = new Image(Driver::class);
                $image = $mananer->read($img)->coverDown(1200, 700);
                $imagenes->setImagen($nombreImagen);

                if (empty($errores)) {

                    if (!is_dir(IMAGES_URL)) {
                        mkdir(IMAGES_URL, 0755, true);
                    }

                    $image->save(IMAGES_URL . $nombreImagen);

                    $imagenes->guardar();
                }
            }
        }

        $router->render('proyectos/imagenes', [
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
                    if ($tipo === 'proyecto') {
                        $proyecto = Proyecto::find($id);
                        $proyecto->eliminar();
                    }
                }
            }
        }
    }
}
