<?php

$resultado = $_GET['enviado'] ?? null;

?>
<?php if ($resultado): ?>
    <dialog open class="msjEnviado text-center">
        <h3>
            <i class="bi bi-info-circle-fill"></i>
            Tu requerimiento ha sido enviado correctamente.
        </h3>

        <form method="dialog">
            <div class="d-grid d-md-flex my-3 justify-content-center">
                <button class="btn btn-light btn-lg text-uppercase fw-lighter fw-bold fs-6">Aceptar</button>
            </div>
        </form>

    </dialog>
<?php endif; ?>
<div class="banner-pqr">
    <div class="container-xl d-flex flex-column align-items-center justify-content-center h-100">
        <h2 class="display-1 text-white">Servicio al Cliente</h2>
        <p class="text-white text-center fs-5">Nuestro equipo está listo para asistirte con cualquier pregunta o
            inquietud. ¡Contáctanos y te ayudaremos encantados!</p>
    </div>
</div>

<main class="container-xl py-5">
    <h1 class="text-center">Enviar una solicitud</h1>

    <div class="row">

        <form action="/servicio-al-cliente" method="POST" class="col-md-6 mx-auto needs-validation" novalidate>
            <div class="mb-3">
                <label class="form-label" for="nombre">Nombre</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                    <div class="invalid-feedback">Por favor, ingresa tu nombre.</div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="correo">Correo</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                    <input type="email" name="correo" id="correo" class="form-control" required>
                    <div class="invalid-feedback">Por favor, ingresa tu correo.</div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="telefono">Teléfono</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                    <input type="tel" name="telefono" id="telefono" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="proyecto">Proyecto</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-hammer"></i></span>
                    <input type="text" name="proyecto" id="proyecto" class="form-control" required>
                    <div class="invalid-feedback">Por favor, ingresa un proyecto.</div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="tipo">Tipo Solicitud</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-journal"></i></span>
                    <select name="tipo" id="tipo" class="form-select" required>
                        <option selected disabled value="">Seleccionar una opción</option>
                        <option value="Peticion">Petición</option>
                        <option value="Queja">Queja</option>
                        <option value="Reclamo">Reclamo</option>
                        <option value="Solicitud">Solicitud</option>
                        <option value="Felicitacion">Felicitación</option>
                    </select>
                    <div class="invalid-feedback">Selecciona un tipo de solicitud.</div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="asunto">Asunto</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-pencil-fill"></i></span>
                    <input type="text" name="asunto" id="asunto" class="form-control" required>
                    <div class="invalid-feedback">El asunto es obligatorio</div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="observaciones">Observaciones</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-patch-question-fill"></i></span>
                    <textarea name="observaciones" id="observaciones" cols="20" rows="10" class="form-control"
                        required></textarea>
                    <div class="invalid-feedback">Dinos mas detalles sobre tu consulta.</div>
                </div>
            </div>

            <div class="d-grid d-md-flex">
                <input type="submit" value="Enviar Solicitud" class="btn btn-outline-dark p-3 text-uppercase fw-bold mt-3">
            </div>

        </form>

    </div>

</main>