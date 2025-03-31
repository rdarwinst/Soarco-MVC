<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\ClientesController;
use Controllers\EquipoController;
use Controllers\LoginController;
use Controllers\PaginasController;
use MVC\Router;
use Controllers\ProyectoController;
use Controllers\TestimonialesController;
use Model\Clientes;

$router = new Router();

/* Zona Privada */

// Proyectos
$router->get('/admin', [ProyectoController::class, 'index']);
$router->get('/proyectos/crear', [ProyectoController::class, 'crear']);
$router->post('/proyectos/crear', [ProyectoController::class, 'crear']);
$router->get('/proyectos/imagenes', [ProyectoController::class, 'imagenes']);
$router->post('/proyectos/imagenes', [ProyectoController::class, 'imagenes']);
$router->get('/proyectos/actualizar', [ProyectoController::class, 'actualizar']);
$router->post('/proyectos/actualizar', [ProyectoController::class, 'actualizar']);
$router->post('/proyectos/eliminar', [ProyectoController::class, 'eliminar']);

// Equipo
$router->get('/equipo/agregar', [EquipoController::class, 'agregar']);
$router->post('/equipo/agregar', [EquipoController::class, 'agregar']);
$router->get('/equipo/actualizar', [EquipoController::class, 'actualizar']);
$router->post('/equipo/actualizar', [EquipoController::class, 'actualizar']);
$router->post('/equipo/eliminar', [EquipoController::class, 'eliminar']);

// Comentarios
$router->get('/comentarios/agregar', [TestimonialesController::class, 'agregar']);
$router->post('/comentarios/agregar', [TestimonialesController::class, 'agregar']);
$router->get('/comentarios/actualizar', [TestimonialesController::class, 'actualizar']);
$router->post('/comentarios/actualizar', [TestimonialesController::class, 'actualizar']);
$router->post('/comentarios/eliminar', [TestimonialesController::class, 'eliminar']);

// Login y Autenticación
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Clientes
$router->post('/clientes/eliminar', [ClientesController::class, 'eliminar']);

/* Zona Pública */
$router->get('/', [PaginasController::class, 'index']);
$router->get('/proyectos', [PaginasController::class, 'proyectos']);
$router->get('/proyecto', [PaginasController::class, 'proyecto']);
$router->post('/proyecto', [PaginasController::class, 'proyecto']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/avaluos', [PaginasController::class, 'avaluos']);
$router->get('/compraventa', [PaginasController::class, 'compraventa']);
$router->get('/deposito-propiedades', [PaginasController::class, 'deposito_propiedades']);
$router->get('/gestion-inmobiliaria', [PaginasController::class, 'gestion_inmobiliaria']);
$router->get('/inversionistas', [PaginasController::class, 'inversionistas']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);
$router->get('/servicio-al-cliente', [PaginasController::class, 'servicio']);
$router->post('/servicio-al-cliente', [PaginasController::class, 'servicio']);
$router->get('/politica-de-privacidad', [PaginasController::class, 'politica_privacidad']);

$router->comprobarRutas();
