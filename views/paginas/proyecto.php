<?php $resultado = boolval($_GET['success']) ?? null; ?>

<?php if ($resultado): ?>
    <dialog open class="msjEnviado">
        <h3 class="text-center">
            <i class="bi bi-info-circle-fill"></i>
            Proto serás contactado por uno de nuestros asesores.
        </h3>

        <form method="dialog">
            <div class="d-grid d-md-flex my-3 justify-content-center">
                <button class="btn btn-light btn-lg text-uppercase fw-lighter fw-bold fs-6">Aceptar</button>
            </div>
        </form>

    </dialog>
<?php endif; ?>

<div class="container-xl py-5 proyecto">
    <div class="row justify-content-evenly">
        <div class="col-md-8">
            <h1 class="text-center"><?php echo s($proyecto->titulo); ?></h1>
            <h2 class="text-center"><?php echo s($proyecto->subtitulo); ?></h2>
            <div class="portada">
                <img loading="lazy" width="200" height="300" src="/uploads/images/<?php echo s($proyecto->imagen); ?>" alt="Imagen Proyecto" class="img-fluid">
            </div>

            <div class="my-3 informacion">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="precio">Desde: $<?php echo s(number_format($proyecto->precio, 2, ',', '.')); ?></h3>
                    <h4 class="fs-4"><?php echo s($proyecto->ubicacion); ?></h4>
                </div>

                <p class="mt-3"><?php echo s($proyecto->descripcion); ?></p>

                <nav>
                    <div class="nav nav-tabs" id="tablist" role="secciones">
                        <button type="button" class="nav-link active" id="generalidades-tab" data-bs-toggle="tab" data-bs-target="#generalidades-tab-pane" role="tab" aria-controls="generalidades-tab-pane" aria-selected="true">Generalidades</button>
                        <button type="button" class="nav-link" id="amenidades-tab" data-bs-toggle="tab" data-bs-target="#amenidades-tab-pane" role="tab" aria-controls="amenidades-tab-pane" aria-selected="false">Amenidades</button>
                        <button type="button" class="nav-link" id="casas-tab" data-bs-toggle="tab" data-bs-target="#casas-tab-pane" role="tab" aria-controls="casas-tab-pane" aria-selected="false">Casas</button>
                    </div>
                </nav>

                <div class="tab-secciones" id="tab-secciones">
                    <div class="tab-pane fade show active" id="generalidades-tab-pane" role="tabpanel" aria-labelledby="generalidades-tab" tabindex="0">
                        <h3 class="mt-3">Generalidades</h3>
                        <div class="carousel slide" id="generalidades" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php

                                use Model\Imagenes;

                                $imagenes = Imagenes::where('tipo', 'generalidades', 'proyecto_id', $proyecto->id);
                                foreach ($imagenes as $index => $imagen):
                                ?>
                                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                        <img src="/uploads/images/<?php echo s($imagen->imagen); ?>" alt="Imagen Generalidades" class="img-fluid">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button type="button" class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#generalidades">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button type="button" class="carousel-control-next" data-bs-slide="next" data-bs-target="#generalidades">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        <ul class="list-group mt-3">
                            <?php
                            $generalidades = explode(', ', $proyecto->generalidades);
                            foreach ($generalidades as $fila) {
                            ?>
                                <li class="list-group-item"><?php echo s(trim($fila)) . '.'; ?></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="tab-pane fade" id="amenidades-tab-pane" role="tabpanel" aria-labelledby="amenidades-tab" tabindex="0">
                        <h3 class="mt-3">Amenidades</h3>
                        <div class="carousel slide" id="amenidades" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $imagenes = Imagenes::where('tipo', 'amenidades', 'proyecto_id', $proyecto->id);
                                foreach ($imagenes as $index => $imagen):
                                ?>
                                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                        <img src="/uploads/images/<?php echo s($imagen->imagen); ?>" alt="Imagen Generalidades" class="img-fluid">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button type="button" class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#amenidades">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button type="button" class="carousel-control-next" data-bs-slide="next" data-bs-target="#amenidades">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        <ul class="list-group mt-3">
                            <?php
                            $amenidades = explode(', ', $proyecto->amenidades);
                            foreach ($amenidades as $fila) {
                            ?>
                                <li class="list-group-item"><?php echo s(trim($fila)) . "."; ?></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="tab-pane fade" id="casas-tab-pane" role="tabpanel" aria-labelledby="casas-tab" tabindex="0">
                        <h3 class="mt-3">Casas</h3>
                        <div class="carousel slide" id="casas" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $imagenes = Imagenes::where('tipo', 'casas', 'proyecto_id', $proyecto->id);
                                foreach ($imagenes as $index => $imagen):
                                ?>
                                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                        <img src="/uploads/images/<?php echo s($imagen->imagen); ?>" alt="Imagen Generalidades" class="img-fluid">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button type="button" class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#casas">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button type="button" class="carousel-control-next" data-bs-slide="next" data-bs-target="#casas">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        <ul class="list-group mt-3">
                            <?php
                            $casas = explode(', ', $proyecto->casas);
                            foreach ($casas as $fila) {
                            ?>
                                <li class="list-group-item"><?php echo s(trim($fila)) . '.'; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h2 class="text-center">Te llamamos</h2>
            <form action="/proyecto?id=<?php echo s($proyecto->id); ?>" method="POST" class="needs-validation bg-light p-4 mt-4 rounded-3" novalidate>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                        <input type="text" name="cliente[nombre]" id="nombre" class="form-control <?php echo isset($errores['nombre']) ? 'is-invalid' : ''; ?>" value="<?php echo s($cliente->nombre); ?>" required>
                        <div class="invalid-feedback"><?php echo $errores['nombre'] ?? 'Tu nombre es obligatorio.'; ?></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                        <input type="text" name="cliente[apellido]" id="apellido" class="form-control <?php echo isset($errores['apellido']) ? 'is-invalid' : ''; ?>" value="<?php echo s($cliente->apellido); ?>" required>
                        <div class="invalid-feedback"><?php echo $errores['apellido'] ?? 'Tu apellido es obligatorio.'; ?></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                        <input type="email" name="cliente[correo]" id="correo" class="form-control <?php echo isset($errores['correo']) ? 'is-invalid' : ''; ?>" value="<?php echo s($cliente->correo); ?>" required>
                        <div class="invalid-feedback"><?php echo $errores['correo'] ?? 'El email es obligatorio.'; ?></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono o Celular</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-phone-fill"></i></span>
                        <input type="tel" name="cliente[telefono]" id="telefono" class="form-control <?php echo isset($errores['telefono']) ? 'is-invalid' : ''; ?>" value="<?php echo s($cliente->telefono); ?>" required>
                        <div class="invalid-feedback"><?php echo $errores['telefono'] ?? 'El número de contacto es obligatorio.'; ?></div>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" name="cliente[proyecto]" value="<?php echo s($proyecto->id); ?>">
                </div>
                <div class="mb-3">
                    <input type="hidden" name="cliente[titulo]" value="<?php echo s($proyecto->titulo); ?>">
                </div>
                <div class="d-grid d-md-flex">
                    <input type="submit" value="Registrarme" class="mt-3 btn btn-dark p-3 text-uppercase fw-bold">
                </div>
            </form>
        </div>
    </div>
</div>