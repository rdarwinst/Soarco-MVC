<?php

namespace Controllers;

use MVC\Router;
use Model\Equipo;
use Model\Clientes;
use Model\Proyecto;
use Model\Testimoniales;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {
        $proyectos = Proyecto::get(2);
        $testimonios = Testimoniales::get(3);

        $offsets = [2, 4, 6];

        $router->render('paginas/index', [
            'proyectos' => $proyectos,
            'testimonios' => $testimonios,
            'offsets' => $offsets
        ]);
    }

    public static function proyectos(Router $router)
    {
        $proyectos = Proyecto::all();
        $router->render('paginas/proyectos', [
            'proyectos' => $proyectos
        ]);
    }

    public static function proyecto(Router $router)
    {
        $id = validarORedireccionar('/proyectos');
        $proyecto = Proyecto::find($id);
        $cliente = new Clientes;
        $errores = Clientes::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $cliente = new Clientes($_POST['cliente']);

            $errores = $cliente->validar();

            if (empty($errores)) {

                $mail = new PHPMailer();

                try {
                    $mail->isSMTP();
                    $mail->Host = $_ENV['EMAIL_HOST'];
                    $mail->SMTPAuth = true;
                    $mail->Port = $_ENV['EMAIL_PORT'];
                    $mail->Username = $_ENV['EMAIL_USER'];
                    $mail->Password = $_ENV['EMAIL_PASS'];

                    $mail->setFrom('no-reply@constructorasoarco.com', 'No-Reply');
                    $mail->addAddress('admin@constructorasoraco.com');
                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8';

                    $contenido = "<html>";
                    $contenido .= "<head><style>body {font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #EEF0F2;} table {width: 100%; max-width: 600px; margin: 20px auto; border-collapse: collapse; background-color: #ffffff;} td {padding: 10px; text-align: left;} h1 {color: #C21E24; font-size: 24px; margin-bottom: 20px;} p {font-size: 16px; color: #0d0d0d;} .button {background-color: #C21E24; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; display: inline-block; font-size: 16px; width: auto;} @media only screen and (max-width: 600px) { .content { padding: 10px; } h1 { font-size: 22px; } p { font-size: 14px; } .button { width: 100%; font-size: 18px; padding: 15px; } }</style></head>";
                    $contenido .= "<body>";
                    $contenido .= "<table>";
                    $contenido .= "<tr><td><h1>Nueva Persona Interesada en un Proyecto</h1></td></tr>";
                    $contenido .= "<tr><td><p>Hola, alguien se ha registrado como interesado(a) en el siguiente proyecto: <b>" . $cliente->titulo . "</b></p>";
                    $contenido .= "<p>La información registrada es la siguiente:</p>";
                    $contenido .= "<p><b>Nombre: </b> " . $cliente->nombre . " " . $cliente->apellido . "</p>";
                    $contenido .= "<p><b>Email: </b> " . $cliente->correo . "</p>";
                    $contenido .= "<p><b>Teléfono: </b> " . $cliente->telefono . "</p>";
                    $contenido .= "<p><b>Proyecto de Interés: </b> " . $cliente->titulo . "</p>";
                    $contenido .= "<p>Si deseas más información, haz clic en el siguiente botón:</p>";
                    $contenido .= "<p><a href='" . $_ENV['APP_URL'] . "/login' class='button'>Ver Más Información</a></p></td></tr>";
                    $contenido .= "</table>";
                    $contenido .= "</body>";
                    $contenido .= "</html>";

                    $mail->Subject = "Nuevo Interesado en un proyecto.";
                    $mail->Body = $contenido;
                    $mail->AltBody = "Hola, la persona " . $cliente->nombre . " " . $cliente->apellido . " se ha registrado como interesado(a) en el siguiente proyecto: " . $cliente->titulo . " " . " - Email: " . $cliente->correo . " - Teléfono: " . $cliente->telefono;

                    $enviado = $mail->send();
                    $resultado = $cliente->guardar();

                    if ($enviado && $resultado) {
                        header("Location: /proyecto?id=" . $proyecto->id . "&success=true");
                        exit;
                    }
                } catch (Exception $e) {
                    echo "Error al enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        }

        $router->render('paginas/proyecto', [
            'proyecto' => $proyecto,
            'cliente' => $cliente,
            'errores' => $errores
        ]);
    }

    public static function nosotros(Router $router)
    {
        $personas = Equipo::all();
        $router->render('paginas/nosotros', [
            'personas' => $personas
        ]);
    }
    public static function avaluos(Router $router)
    {
        $router->render('paginas/avaluos');
    }
    public static function compraventa(Router $router)
    {
        $router->render('paginas/compraventa');
    }
    public static function deposito_propiedades(Router $router)
    {
        $router->render('paginas/deposito');
    }
    public static function gestion_inmobiliaria(Router $router)
    {
        $router->render('paginas/gestion');
    }
    public static function inversionistas(Router $router)
    {
        $router->render('paginas/inversionistas');
    }
    public static function contacto(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Looking to send emails in production? Check out our Email API/SMTP product!
            $mail = new PHPMailer();
            try {
                $mail->isSMTP();
                $mail->Host = $_ENV['EMAIL_HOST'];
                $mail->SMTPAuth = true;
                $mail->Port = $_ENV['EMAIL_PORT'];
                $mail->Username = $_ENV['EMAIL_USER'];
                $mail->Password = $_ENV['EMAIL_PASS'];

                $mail->setFrom('no-reply@constructorasoarco.com', 'No-Reply');
                $mail->addAddress('contacto@constructorasoraco.com');
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';

                $contenido = "<html>";
                $contenido .= "<head>";
                $contenido .= "<style>";
                $contenido .= "body { font-family: 'Arial', sans-serif; background-color: #EEF0F2; color: #0d0d0d; margin: 0; padding: 0;}";
                $contenido .= ".email-container { max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 30px;}";
                $contenido .= "h1 { color: #C21E24; text-align: center; font-size: 24px; margin-bottom: 20px; font-weight: 700; }";
                $contenido .= "p { font-size: 16px; line-height: 1.6; margin: 10px 0; padding: 0; }";
                $contenido .= "b { color: #C21E24; font-weight: 600; }";
                $contenido .= ".footer { text-align: center; font-size: 14px; color: #aaa; margin-top: 30px; border-top: 1px solid #ddd; padding-top: 15px;}";
                $contenido .= ".footer a { color: #C21E24; text-decoration: none; font-weight: 600;}";
                $contenido .= "@media (max-width: 600px) {";
                $contenido .= "  h1 { font-size: 20px; }";
                $contenido .= "  p { font-size: 14px; padding: 0 10px; }";
                $contenido .= "  .email-container { padding: 20px; }";
                $contenido .= "}";
                $contenido .= "</style>";
                $contenido .= "</head>";
                $contenido .= "<body>";

                $contenido .= "<div class='email-container'>";
                $contenido .= "<h1>Nuevo mensaje de Constructora Soarco</h1>";
                $contenido .= "<p>Hola, alguien ha enviado información a través del formulario de contacto.</p>";

                $contenido .= "<p><b>Nombre: </b>" . $_POST["nombre"] . "</p>";
                $contenido .= "<p><b>Teléfono: </b>" . $_POST["telefono"] . "</p>";
                $contenido .= "<p><b>Correo Electrónico: </b>" . $_POST["email"] . "</p>";
                $contenido .= "<p><b>Asunto: </b>" . $_POST["asunto"] . "</p>";
                $contenido .= "<p><b>Mensaje: </b>" . $_POST["mensaje"] . "</p>";

                $contenido .= "<div class='footer'>";
                $contenido .= "<p>Este mensaje fue enviado a través del formulario de contacto de Constructora Soarco. ";
                $contenido .= "<a href='https://constructorasoarco.com' target='_blank'>Visita nuestro sitio web</a> para más información.</p>";
                $contenido .= "</div>";

                $contenido .= "</div>";
                $contenido .= "</body>";
                $contenido .= "</html>";


                $mail->Subject = "Nuevo mensaje de Contructora Soarco.";
                $mail->Body = $contenido;
                $mail->AltBody = "Hola, " . $_POST['nombre'] . " ha enviado un mensajde desde el formulario de contacto en tu sitio web. Teléfono: " . $_POST['telefono'] . " Correo Electrónico: " . $_POST['email'] . " Asunto: " . $_POST['asunto'] . " Mensaje: " . $_POST['mensaje'];

                $enviado = $mail->send();

                if ($enviado) {
                    header('Location: /contacto?enviado=1');
                    exit;
                }
            } catch (Exception $e) {
                echo "Error al enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
            }
        }

        $router->render('paginas/contacto');
    }
    public static function servicio(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $mail = new PHPMailer();

            try {
                $mail->isSMTP();
                $mail->Host = $_ENV['EMAIL_HOST'];
                $mail->SMTPAuth = true;
                $mail->Port = $_ENV['EMAIL_PORT'];
                $mail->Username = $_ENV['EMAIL_USER'];
                $mail->Password = $_ENV['EMAIL_PASS'];

                $mail->setFrom('no-reply@constructorasoarco.com', 'No-Reply');
                $mail->addAddress('contacto@constructorasoraco.com');
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';

                $contenido = "<html>";
                $contenido .= "<head>";
                $contenido .= "<style>";
                $contenido .= "
                    /* Reset basic styles */
                    body, h1, p {
                        margin: 0;
                        padding: 0;
                        font-family: Arial, sans-serif;
                    }
                    body {
                        background-color: #EEF0F2; /* Color claro para el fondo */
                        color: #0d0d0d; /* Gris oscuro para el texto principal */
                        line-height: 1.6;
                    }
                    h1 {
                        font-size: 24px;
                        color: #C21E24; /* Rojo corporativo */
                    }
                    p {
                        font-size: 16px;
                        color: #0d0d0d; /* Gris oscuro */
                        margin: 10px 0;
                    }
                    b {
                        color: #0d0d0d; /* Gris oscuro */
                    }
                    
                    /* Main container */
                    .email-container {
                        max-width: 600px;
                        margin: 0 auto;
                        background-color: #ffffff; /* Fondo blanco para el contenedor */
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    }
                
                    /* Button style */
                    .button {
                        background-color: #C21E24; /* Rojo corporativo */
                        color: #ffffff;
                        padding: 10px 20px;
                        text-decoration: none;
                        border-radius: 5px;
                        text-align: center;
                    }
                
                    /* Responsive styles */
                    @media screen and (max-width: 600px) {
                        h1 {
                            font-size: 20px;
                        }
                        p {
                            font-size: 14px;
                        }
                        .email-container {
                            padding: 15px;
                        }
                    }
                ";
                $contenido .= "</style>";
                $contenido .= "</head>";
                $contenido .= "<body>";
                $contenido .= "<div class='email-container'>";
                $contenido .= "<h1>Nuevo(a) " . $_POST["tipo"] . " de Constructora Soarco</h1>";
                $contenido .= "<p>Hola, alguien ha escrito el/la siguiente " . $_POST["tipo"] . " en tu sitio web.</p>";
                $contenido .= "<p><b>Nombre: </b>" . $_POST["nombre"] . "</p>";
                $contenido .= "<p><b>Email: </b>" . $_POST["correo"] . "</p>";
                $contenido .= "<p><b>Teléfono: </b>" . $_POST["telefono"] . "</p>";
                $contenido .= "<p><b>Proyecto: </b>" . $_POST["proyecto"] . "</p>";
                $contenido .= "<p><b>Tipo de requerimiento: </b>" . $_POST["tipo"] . "</p>";
                $contenido .= "<p><b>Asunto: </b>" . $_POST["asunto"] . "</p>";
                $contenido .= "<p><b>Observaciones: </b>" . $_POST["observaciones"] . "</p>";
                $contenido .= "</div>";
                $contenido .= "</body>";
                $contenido .= "</html>";

                $mail->Subject = "Nuevo PQRFS de Contructora Soarco.";
                $mail->Body = $contenido;
                $mail->AltBody = "Hola, " . $_POST['nombre'] . " ha escrito un requerimiento desde el formulario de solicitudes en tu sitio web. Teléfono: " . $_POST['telefono'] . " Correo Electrónico: " . $_POST['correo'] . " Asunto: " . $_POST['asunto'] . " Proyecto: " . $_POST['proyecto'] . " Observaciones: " . $_POST['observaciones'];

                $enviado = $mail->send();

                if ($enviado) {
                    header('Location: /servicio-al-cliente?enviado=1');
                    exit;
                }
            } catch (Exception $e) {
                echo "Error al enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        $router->render('paginas/pqr');
    }
    public static function politica_privacidad(Router $router)
    {
        $router->render('paginas/pprivacidad');
    }
}
