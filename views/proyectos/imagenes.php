<main class="container-xl py-5 form-imagenes">

    <div class="row">

        <div class="col-md-6 mx-auto">

            <h1>Agregar Imagenes a un Proyecto</h1>
            <div class="d-grid d-md-flex my-3">
                <a href="/admin" class="btn btn-outline-dark p-3 fw-bold text-uppercase rounded-0">Regresar <i class="bi bi-arrow-return-left"></i></a>
            </div>

            <form method="POST" class="needs-validation" novalidate enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="tipo" class="form-label">Categoría Imagen</label>

                    <select name="tipo" id="tipo" class="form-select <?php echo isset($errores['categoria']) ? 'is-invalid' : ''; ?>" required>
                        <option selected disabled value="">Seleccionar Categoría</option>
                        <option value="generalidades">Generalidades</option>
                        <option value="amenidades">Amenidades</option>
                        <option value="casas">Casas</option>
                    </select>
                    <div class="invalid-feedback"><?php echo $errores['categoria'] ?? 'Debe seleccionar la categoría de la imagen.'; ?></div>
                </div>

                <div class="mb-3">
                    <label for="proyecto_id" class="form-label">Proyecto</label>

                    <select name="proyecto_id" id="proyecto_id" class="form-select <?php echo isset($errores['proyecto']) ? 'is-invalid' : ''; ?>" required>
                        <option selected disabled value="">Seleccionar Proyecto</option>
                        <?php foreach ($proyectos as $proyecto): ?>
                            <option value="<?php echo s($proyecto->id); ?>"><?php echo s($proyecto->titulo); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback"><?php echo $errores['proyecto'] ?? 'Debe seleccionar un proyecto para agregarle las imagenes.'; ?></div>
                </div>


                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagenes</label>

                    <input
                        type="file"
                        name="imagen[]"
                        id="imagen"
                        class="form-control <?php echo isset($errores['imagen']) ? 'is-invalid' : ''; ?>"
                        multiple
                        accept="image/jpeg,  image/png"
                        required>
                    <div class="invalid-feedback"><?php echo $errores['imagen'] ?? 'Seleccione al menos una imagen.'; ?></div>
                </div>

                <div class="my-3 d-grid d-md-flex">
                    <input type="submit" value="Cargar Imagenes"
                        class="btn btn-outline-dark p-3 text-uppercase fw-bold rounded-0">
                </div>
            </form>
        </div>
    </div>
</main>