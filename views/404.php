<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;
?>
<!DOCTYPE html>
<html lang="es" style="scrollbar-width: none;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constructora Soarco SAS</title>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap">
    </noscript>
    
    <link rel="preload" href="../build/css/app.min.css" as="style" onload="this.onload=null; this.rel='stylesheet'">

    <noscript>
        <link rel="stylesheet" href="../build/css/app.min.css">
    </noscript>


    <link rel="prefetch" href="../build/js/bundle.min.js">
</head>

<body>

    <header class="header bg-dark py-3 py-md-5">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-xl">
                <a href="/" class="navbar-brand">
                    <img src="../build/img/soarco-logo.svg" alt="Logo Soarco" width="120" style="filter: invert(1);">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav-principal">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="nav-principal">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a href="/nosotros" class="nav-link">Nosotros</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Servicios</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li>
                                    <a href="/avaluos" class="dropdown-item">Avalúos</a>
                                </li>
                                <li>
                                    <a href="/compraventa" class="dropdown-item">Compra &VerticalSeparator; Venta de
                                        inmuebles</a>
                                </li>
                                <li>
                                    <a href="/deposito-propiedades" class="dropdown-item">Depósito de Propiedades</a>
                                </li>
                                <li>
                                    <a href="/gestion-inmobiliaria" class="dropdown-item">Gestión Inmobiliaria</a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="/inversionistas" class="nav-link">Inversionistas</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Contacto</a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li>
                                    <a href="/contacto" class="dropdown-item">Contacto</a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="/servicio-al-cliente" class="dropdown-item">Servicio al Cliente</a>
                                </li>
                            </ul>
                        </li>
                        <?php if ($auth): ?>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuario</a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li>
                                        <a href="/admin" class="dropdown-item">Administrar</a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li>
                                        <a href="/cerrar-sesion" class="dropdown-item">Cerrar Sesión</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="position-fixed top-50 end-0 me-3 z-2 d-flex flex-column gap-4 ayuda">
        <a href="https://wa.link/jxc2g3" target="_blank" class="btn btn-lg btn-success rounded-circle d-flex justify-content-center align-items-center" style="height: 50; width: 50;"><i class="bi bi-whatsapp"></i></a>
        <button type="button" data-bs-toggle="modal" data-bs-target="#formModal" class="btn btn-lg btn-danger rounded-circle d-flex justify-content-center align-items-center" style="height: 50; width: 50;"><i class="bi bi-patch-question"></i></button>
    </div>

    <div class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-hidden="true" aria-labelledby="formModalTitle" data-bs-theme="dark">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fs-4 modal-title text-white" id="formModalTitle">¡Te Ayudamos!</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div><!-- .modal-header -->
                <div class="modal-body">
                    <form class="needs-validation" novalidate>
                        <div class="mb-2">
                            <label for="nombre" class="form-label text-white">Nombre</label>
                            <input
                                type="text"
                                name="nombre"
                                id="nombre"
                                class="form-control"
                                required>
                            <div class="invalid-feedback">El nombre es obligatorio.</div>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label text-white">Email</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control"
                                required>
                            <div class="invalid-feedback">El apellido es obligatorio.</div>
                        </div>
                        <div class="mb-2">
                            <label for="telefono" class="form-label text-white">Teléfono</label>
                            <input
                                type="tel"
                                name="telefono"
                                id="telefono"
                                class="form-control"
                                required>
                            <div class="invalid-feedback">El número de contacto es obligatorio.</div>
                        </div>
                        <div class="mb-2">
                            <label for="mensaje" class="form-label text-white">Mensaje</label>
                            <textarea
                                name="mensaje"
                                id="mensaje"
                                rows="3"
                                class="form-control"
                                required></textarea>
                            <div class="invalid-feedback">Debes ingresar un mensaje o consulta.</div>
                        </div>
                        <div class="my-4 d-grid d-md-flex justify-content-md-end gap-3">
                            <button type="button" class="btn btn-lg btn-outline-danger fs-6 fw-bold text-uppercase" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-lg btn-outline-light fs-6 fw-bold text-uppercase">Solicitar Ayuda</button>
                        </div>
                    </form>
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->

    </div><!-- .modal -->

    <main class="container-xl py-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <img src="/build/img/404.svg" alt="Error 404 Image" class="img-fluid" style="filter: drop-shadow(0 0 .75rem #0d0d0d);">
                <h1 class="text-center">Ooops, ¡Página No Encontrada!</h1>
                <div class="d-grid d-md-flex justify-content-md-center">
                    <a href="/" class="btn btn-lg btn-outline-dark fw-bold text-uppercase">Ir a Inicio</a>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer bg-dark py-5">
        <div class="container-xl">
            <div class="row align-items-start text-center text-md-start">
                <nav class="col-md-3 mt-4 mt-md-0 d-grid gap-2">
                    <h3 class="text-white">Servicios</h3>
                    <a href="/compraventa" class="text-white text-decoration-none">Compra &VerticalSeparator; Venta
                        de
                        Inmuebles</a>
                    <a href="/avaluos" class="link-light text-decoration-none">Avalúos</a>
                    <a href="/deposito-propiedades" class="link-light text-decoration-none">Depósito de Propiedades</a>
                    <a href="/gestion-inmobiliaria" class="link-light text-decoration-none">Gestión Inmobiliaria</a>
                </nav>
                <nav class="col-md-3 mt-4 mt-md-0 d-grid gap-2">
                    <h3 class="text-white">Nosotros</h3>
                    <a href="/nosotros#mision" class="link-light text-decoration-none">Misión y Visión</a>
                    <a href="/nosotros#historia" class="link-light text-decoration-none">Nuestra Historia</a>
                    <a href="/nosotros#valores" class="link-light text-decoration-none">Nuestros Valores</a>
                </nav>

                <nav class="col-md-3 mt-4 mt-md-0 d-grid gap-2">
                    <h3 class="text-white">Soporte</h3>
                    <a href="/servicio-al-cliente" class="link-light text-decoration-none">Asistencia al Usuario</a>
                    <a href="/politica-de-privacidad" class="link-light text-decoration-none">Politica de Privacidad</a>
                </nav>

                <div class="col-md-3 mt-4 mt-md-0 d-grid gap-2">
                    <h3 class="text-white">Contactenos</h3>
                    <a class="text-decoration-none link-light" href="tel:+573118651819">311 865 1819</a>
                    <div class="text-wrap" style="width: 6rem;">

                    </div>
                    <a href="mailto:contacto@constructorasoarco.com" class="link-light text-break text-decoration-none">contacto@constructorasoarco.com</a>
                </div>

            </div>
        </div>
        <div class="container-xl mt-5 d-flex flex-column flex-md-row align-items-center justify-content-between">
            <p class="text-white copyright fs-6 my-2">Copyright &copy; Constructora Soarco SAS</p>
            <nav class="redes d-flex gap-4">
                <a href="https://facebook.com/" class="link-light" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="https://instagram.com/" class="link-light" target="_blank"><i class="bi bi-instagram"></i></a>
                <a href="https://x.com/" class="link-light" target="_blank"><i class="bi bi-twitter-x"></i></a>
                <a href="https://tiktok.com/" class="link-light" target="_blank"><i class="bi bi-tiktok"></i></a>
                <a href="https://youtube.com/" class="link-light" target="_blank"><i class="bi bi-youtube"></i></a>
            </nav>
        </div>
    </footer>



    <script src="../build/js/bundle.min.js" defer></script>
</body>

</html>