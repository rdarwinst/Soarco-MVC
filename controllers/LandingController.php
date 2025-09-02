<?php

namespace Controllers;

use MVC\Router;

class LandingController {
    public static function landing(Router $router) {
        require __DIR__ . '/../views/landing/index.php';
    }
}