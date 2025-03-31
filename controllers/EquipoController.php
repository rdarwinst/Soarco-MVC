<?php

namespace Controllers;

use Model\Equipo;
use MVC\Router;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class EquipoController
{

    public static function agregar(Router $router)
    {

        $persona = new Equipo;
        $errores = Equipo::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $persona = new Equipo($_POST['equipo']);

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['equipo']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $imagen = $manager->read($_FILES['equipo']['tmp_name']['imagen'])->cover(800, 600);
                $persona->setImagen($nombreImagen);
            }

            $errores = $persona->validar();

            if (empty($errores)) {

                if (!is_dir(IMAGES_URL)) {
                    mkdir(IMAGES_URL, 0755, true);
                }

                $imagen->save(IMAGES_URL . $nombreImagen);

                $resultado = $persona->guardar();

                if ($resultado) {
                    header('Location: /admin?success=1');
                    exit;
                }
            }
        }

        $router->render('equipo/agregar', [
            'persona' => $persona,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');

        $persona = Equipo::find($id);
        $errores = Equipo::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['equipo'];

            $persona->sincronizar($args);

            $errores = $persona->validar();

            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['equipo']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $imagen = $manager->read($_FILES['equipo']['tmp_name']['imagen'])->cover(800, 600);
                $persona->setImagen($nombreImagen);
            }

            if (empty($errores)) {

                if ($_FILES['equipo']['tmp_name']['imagen']) {
                    $imagen->save(IMAGES_URL . $nombreImagen);
                }

                $resultado = $persona->guardar();

                if ($resultado) {
                    header('Location: /admin?success=2');
                    exit;
                }
            }
        }

        $router->render('equipo/actualizar', [
            'persona' => $persona,
            'errores' => $errores
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
                    if ($tipo === 'persona') {
                        $persona = Equipo::find($id);
                        $persona->eliminar();
                    }
                }
            }
        }
    }
}
