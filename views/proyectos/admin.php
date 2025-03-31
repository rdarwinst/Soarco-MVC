<main class="container-xl py-5 administracion">
    <h1 class="text-center">Modulo de Administración</h1>

    <div class="row my-3">

        <ul class="nav nav-pills flex-column flex-md-row align-items-center justify-content-center" id="modulos"
            role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="proyectos-tab" data-bs-toggle="tab"
                    data-bs-target="#proyectos-tab-pane" type="button" role="tab"
                    aria-controls="proyectos-tab-pane" aria-selected="true">Proyectos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="equipo-tab" data-bs-toggle="tab" data-bs-target="#equipo-tab-pane"
                    type="button" role="tab" aria-controls="equipo-tab-pane"
                    aria-selected="false">Equipo</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="comentarios-tab" data-bs-toggle="tab"
                    data-bs-target="#comentarios-tab-pane" type="button" role="tab"
                    aria-controls="comentarios-tab-pane" aria-selected="false">Comentarios</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="clientes-tab" data-bs-toggle="tab"
                    data-bs-target="#clientes-tab-pane" type="button" role="tab"
                    aria-controls="clientes-tab-pane" aria-selected="false">Posibles Clientes</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="proyectos-tab-pane" role="tabpanel"
                aria-labelledby="proyectos-tab" tabindex="0">
                <h2 class="my-3">Proyectos</h2>

                <div class="d-flex flex-column flex-md-row gap-2 my-3">
                    <a href="/proyectos/crear" class="btn btn-outline-success p-3 fw-bold text-uppercase rounded-0">Agregar Proyecto</a>
                    <a href="/proyectos/imagenes" class="btn btn-outline-success p-3 fw-bold text-uppercase rounded-0">Agregar Imagenes</a>
                </div>

                <div class="table table-responsive-md">
                    <table class="table align-middle table-hover">
                        <caption>Listado de Proyectos.</caption>

                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Portada</th>
                                <th scope="col">Fecha Agregado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            <?php foreach ($proyectos as $proyecto): ?>

                                <tr>
                                    <td><?php echo s($proyecto->id); ?></td>
                                    <th scope="row"><?php echo ucwords(s($proyecto->titulo)); ?></th>
                                    <td>
                                        <img src="/uploads/images/<?php echo s($proyecto->imagen); ?>" alt="Portada del Proyecto <?php echo s($proyecto->titulo); ?>" class="img-fluid" width="200px" height="auto" title="Portada del Proyecto <?php echo s($proyecto->titulo); ?>">
                                    </td>
                                    <td><?php echo s($proyecto->fecha); ?></td>
                                    <td>
                                        <a href="/proyectos/actualizar?id=<?php echo s($proyecto->id); ?>" class="btn btn-outline-warning p-3 text-uppercase fw-bold rounded-0 my-3 w-100">Actualizar <i class="bi bi-arrow-clockwise"></i></a>
                                        <form action="/proyectos/eliminar" method="POST">
                                            <input type="hidden" name="id" value="<?php echo s($proyecto->id); ?>">
                                            <input type="hidden" name="tipo" value="proyecto">
                                            <button type="submit" class="btn btn-outline-danger p-3 fw-bold text-uppercase rounded-0 w-100">Eliminar <i class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>

            </div>

            <div class="tab-pane fade" id="equipo-tab-pane" role="tabpanel" aria-labelledby="equipo-tab"
                tabindex="0">
                <h2 class="my-3">Equipo</h2>

                <div class="my-3 d-flex flex-column flex-md-row gap-2">
                    <a href="/equipo/agregar" class="btn btn-outline-success fw-bold text-uppercase p-3 rounded-0">Agregar Persona</a>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle table-hover">
                        <caption>Miembros del Equipo Soarco SAS.</caption>

                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            <?php foreach ($personas as $persona): ?>
                                <tr>
                                    <th scope="row"><?php echo s($persona->nombre) . " " . s($persona->apellido); ?></th>
                                    <td><?php echo s($persona->cargo); ?></td>
                                    <td><a href="tel:+57<?php echo s($persona->telefono); ?>"
                                            class="text-decoration-none text-dark"><?php echo s($persona->telefono); ?></a></td>
                                    <td>
                                        <a href="mailto:<?php echo s($persona->correo); ?>"
                                            class="text-decoration-none text-dark"><?php echo s($persona->correo); ?></a>
                                    </td>
                                    <td>
                                        <img src="/uploads/images/<?php echo s($persona->imagen); ?>" width="200px" alt="Foto de <?php echo s($persona->nombre) . " " . s($persona->apellido); ?>" title="Foto de <?php echo s($persona->nombre) . " " . s($persona->apellido); ?>">
                                    </td>
                                    <td>
                                        <a href="/equipo/actualizar?id=<?php echo s($persona->id); ?>" class="btn btn-outline-warning p-3 text-uppercase fw-bold rounded-0 my-3 w-100">Actualizar <i class="bi bi-arrow-clockwise"></i></a>
                                        <form action="/equipo/eliminar" method="POST">
                                            <input type="hidden" name="id" value="<?php echo s($persona->id); ?>">
                                            <input type="hidden" name="tipo" value="persona">
                                            <button type="submit" class="btn btn-outline-danger p-3 fw-bold text-uppercase rounded-0 w-100">Eliminar <i class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="tab-pane fade" id="comentarios-tab-pane" role="tabpanel"
                aria-labelledby="comentarios-tab" tabindex="0">
                <h2 class="my-3">Comentarios</h2>

                <div class="my-3 d-flex flex-column flex-md-row gap-2">
                    <a href="/comentarios/agregar" class="btn btn-outline-success fw-bold text-uppercase p-3 rounded-0">Agregar Comentario</a>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle table-hover">
                        <caption>Comentarios de los Clientes.</caption>

                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Proyecto</th>
                                <th scope="col">Comentario</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach ($testimonios as $testimonio): ?>
                                <tr>
                                    <th scope="row"><?php echo s($testimonio->nombre) . " " . s($testimonio->apellido); ?></th>
                                    <td><?php echo s($testimonio->proyecto_id); ?></td>
                                    <td class="w-50"><?php echo s($testimonio->testimonio); ?></td>
                                    <td><?php echo s($testimonio->fecha); ?></td>
                                    <td>
                                        <a href="/comentarios/actualizar?id=<?php echo s($testimonio->id); ?>" class="btn btn-outline-warning p-3 text-uppercase fw-bold rounded-0 my-3 w-100">Actualizar <i class="bi bi-arrow-clockwise"></i></a>
                                        <form action="/comentarios/eliminar" method="POST">
                                            <input type="hidden" name="id" value="<?php echo s($testimonio->id); ?>">
                                            <input type="hidden" name="tipo" value="testimonial">
                                            <button type="submit" class="btn btn-outline-danger fw-bold text-uppercase p-3 rounded-0 w-100">Eliminar <i class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="tab-pane fade" id="clientes-tab-pane" role="tabpanel" aria-labelledby="clientes-tab"
                tabindex="0">
                <h2 class="my-3">Posibles Clientes</h2>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <caption>Clientes que desean ser contactados.</caption>

                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Télefono</th>
                                <th scope="col">Email</th>
                                <th scope="col">Proyecto de Interes</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            <?php foreach ($clientes as $cliente): ?>
                                <tr>
                                    <th scope="row"><?php echo s($cliente->nombre) . " " . s($cliente->apellido);  ?></th>
                                    <td><a href="tel:+57<?php echo s($cliente->telefono); ?>" class="text-decoration-none text-dark"><?php echo s($cliente->telefono); ?></a></td>
                                    <td><a href="mailto:<?php echo s($cliente->correo); ?>" class="text-decoration-none text-dark"><?php echo s($cliente->correo); ?></a></td>
                                    <td><?php echo s($cliente->titulo); ?></td>
                                    <td>
                                        <form action="/clientes/eliminar" method="POST">
                                            <input type="hidden" name="id" value="<?php echo s($cliente->id); ?>">
                                            <input type="hidden" name="tipo" value="cliente">
                                            <button type="submit" class="btn btn-outline-danger w-100 fw-bold text-uppercase p-3 rounded-0">Eliminar <i class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

</main>

<div class="position-fixed bottom-50 end-0 p-3">
    <div class="toast hide" id="successToast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Resultado</strong>
            <small class="text-body-secondary">Justo ahora</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Cerrar"></button>
        </div>
        <div class="toast-body">
            <p class="m-0"></p>
        </div>
    </div>
</div>