<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('IMAGES_URL', $_SERVER['DOCUMENT_ROOT'] . '/uploads/images/');


function incluirTemplate(string $nombre)
{
    include TEMPLATES_URL . "/{$nombre}.php";
}

function debuguear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function s($html)
{
    $s = htmlspecialchars($html);
    return $s;
}

function estaAutenticado()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!$_SESSION['login']) {
        header('Location: /');
    }
}

function validarTipoContenido($tipo)
{
    $tipos = ['proyecto', 'persona', 'testimonial', 'cliente'];

    return in_array($tipo, $tipos);
}

function validarORedireccionar(string $url)
{
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: {$url}");
        exit;
    }
    return $id;
}
