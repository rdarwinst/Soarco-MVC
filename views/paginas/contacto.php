<?php

$resultado = $_GET['enviado'] ?? null;

?>
<?php if ($resultado): ?>
    <dialog open class="msjEnviado">
        <h3 class="text-center">
            <i class="bi bi-info-circle-fill"></i>
            Mensaje enviado correctamente.
        </h3>

        <form method="dialog">
            <div class="d-grid d-md-flex my-3 justify-content-center">
                <button class="btn btn-light btn-lg text-uppercase fw-lighter fw-bold fs-6">Aceptar</button>
            </div>
        </form>

    </dialog>
<?php endif; ?>
<div class="banner-contacto">
    <div
        class="container-xl d-flex  flex-column align-items-center justify-content-center h-100 text-white text-center">
        <h2 class="display-1">Contáctanos</h2>
        <p class="fs-5">Nuestro equipo está aquí para ayudarte. Si tienes alguna duda, inquietud o necesitas más
            información, no
            dudes en ponerte en contacto con nosotros. Responderemos a tu mensaje lo más rápido posible.</p>
    </div>
</div>

<div class="container-xl py-5">
    <div class="row justify-content-center gap-5">
        <div class="col-md-5">
            <h2>Estamos listos para asesorarte</h2>
            <form action="/contacto" method="POST" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label class="form-label" for="nombre">Nombre</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                        <div class="invalid-feedback">Tu nombre es obligatorio.</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="telefono">Teléfono</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-phone-fill"></i></div>
                        <input type="tel" name="telefono" id="telefono" class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-envelope-at-fill"></i></div>
                        <input type="email" name="email" id="email" class="form-control" required>
                        <div class="invalid-feedback">Tu email es obligatorio.</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="asunto">Asunto</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-pencil-fill"></i></div>
                        <input type="text" name="asunto" id="asunto" class="form-control" required>
                        <div class="invalid-feedback">El asunto es obligatorio.</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <div class="input-group">
                        <div class="input-group-text"><i class="bi bi-chat-fill"></i></div>
                        <textarea name="mensaje" id="mensaje" cols="10" rows="10" class="form-control"
                            required></textarea>
                        <div class="invalid-feedback">Debes ingresar un mensaje.</div>
                    </div>
                </div>
                <div class="d-grid d-md-flex">
                    <input type="submit" value="Contactar" class="btn btn-outline-dark p-3 mt-2 text-uppercase fw-bold">
                </div>
            </form>
        </div>
        <div class="col-md-5 text-center text-md-start">
            <h2>Información de Contacto</h2>
            <ul class="list-unstyled">
                <li class="mb-3">
                    <h4>Direccion</h4>
                    <p class="m-0">Carrera 33 No. 29 - 20, Bogotá.</p>
                </li>
                <li class="mb-3">
                    <h4>Correo Electrónico</h4>
                    <a href="mailto:correo@constructorasoarco.com"
                        class="text-decoration-none link-dark">correo@constructorasoarco.com</a>
                </li>
                <div class="mb-3">
                    <h4>WhatsApp</h4>
                    <a href="https://wa.link/jxc2g3" target="_blank" class="link-dark text-decoration-none">311 865 1819</a>
                </div>
                <li class="mb-3">
                    <h4>Celular</h4>
                    <a href="tel:+573118651819" class="text-decoration-none link-dark">311 865 1819</a>
                </li>
                <li class="mb-3">
                    <h4>Síguenos</h4>
                    <ul class="nav justify-content-center justify-content-md-start gap-2">
                        <li class="nav-item">
                            <a href="https://facebook.com/" class="bg-dark link-light rounded-5 nav-link"><i
                                    class="bi bi-facebook"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="https://instagram.com/" class="bg-dark link-light rounded-5 nav-link"><i
                                    class="bi bi-instagram"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="https://x.com/" class="bg-dark link-light rounded-5 nav-link"><i
                                    class="bi bi-twitter"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="https://tiktok.com/" class="bg-dark link-light rounded-5 nav-link"><i
                                    class="bi bi-tiktok"></i></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>