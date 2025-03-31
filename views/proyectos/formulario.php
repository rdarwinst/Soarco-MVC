<div class="mb-3">
    <label for="titulo" class="form-label">Nombre Proyecto</label>

    <input
        type="text"
        name="proyecto[titulo]"
        id="titulo"
        class="form-control <?php echo isset($errores['titulo']) ? 'is-invalid' : ''; ?>"
        value="<?php echo s($proyecto->titulo); ?>"
        required>

    <div class="invalid-feedback"><?php echo $errores['titulo'] ?? 'El nombre del proyecto es obligatorio.' ?></div>

</div>

<div class="mb-3">
    <label for="subtitulo" class="form-label">Subtitulo</label>

    <input
        type="text"
        name="proyecto[subtitulo]"
        id="subtitulo"
        value="<?php echo s($proyecto->subtitulo); ?>"
        class="form-control">
</div>

<div class="mb-3">
    <label for="precio" class="form-label">Precio</label>

    <input
        type="number"
        name="proyecto[precio]"
        id="precio"
        min="0"
        class="form-control <?php echo isset($errores['precio']) ? 'is-invalid' : ''; ?>"
        value="<?php echo s($proyecto->precio); ?>"
        required>

    <div class="invalid-feedback"><?php echo $errores['precio'] ?? 'El precio es obligatorio.'; ?></div>
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>

    <textarea
        name="proyecto[descripcion]"
        id="descripcion"
        rows="3"
        class="form-control <?php echo isset($errores['descripcion']) ? 'is-invalid' : ''; ?>"
        aria-describedby="descripcionHelp"
        required><?php echo s($proyecto->descripcion); ?></textarea>

    <div class="invalid-feedback"><?php echo $errores['descripcion'] ?? 'Debe añadir mas información para los usuarios.'; ?></div>

    <div id="descrpcionHelp" class="form-text">La descripción debe tener al menos 50 caracteres.</div>
</div>

<div class="mb-3">
    <label for="ubicacion" class="form-label">Ubicación</label>

    <input
        type="text"
        name="proyecto[ubicacion]"
        id="ubicacion"
        class="form-control"
        value="<?php echo s($proyecto->ubicacion); ?>">
</div>

<div class="mb-3">
    <label for="portada" class="form-label">Portada</label>

    <input
        type="file"
        name="proyecto[imagen]"
        id="portada"
        class="form-control <?php echo isset($errores['imagen']) ? 'is-invalid' : ''; ?>"
        accept="image/png, image/jpeg"
        aria-describedby="imagenHelp"
        required>

    <div class="invalid-feedback"><?php echo $errores['imagen'] ?? 'La imagen de portada es obligatoria.'; ?></div>
    <div class="form-text" id="imagenHelp">Peso Máximo: 3 Mb.</div>
</div>

<?php if ($proyecto->imagen): ?>
    <div class="mb-3">
        <p>Imagen Actual</p>
        <img src="/uploads/images/<?php echo s($proyecto->imagen); ?>" alt="Portada del Proyecto <?php echo s($proyecto->titulo); ?>" class="img-fluid" title="Portada del Proyecto <?php echo s($proyecto->titulo); ?>">
    </div>
<?php endif; ?>

<div class="mb-3">
    <label for="generalidades">Generalidades</label>

    <textarea
        name="proyecto[generalidades]"
        id="generalidades"
        rows="3"
        class="form-control <?php echo isset($errores['generalidades']) ? 'is-invalid' : ''; ?>"
        aria-describedby="generalidadesHelp"
        required><?php echo s($proyecto->generalidades); ?></textarea>

    <div class="invalid-feedback"><?php echo $errores['generalidades'] ?? 'Las generalidades del proyecto son obligatorias.'; ?></div>

    <div id="generalidadesHelp" class="form-text">La información de las generalidades debe tener al menos 50 caracteres.</div>
</div>

<div class="mb-3">
    <label for="amenidades">Amenidades</label>

    <textarea
        name="proyecto[amenidades]"
        id="amenidades"
        rows="3"
        class="form-control <?php echo isset($errores['amenidades']) ? 'is-invalid' : ''; ?>"
        aria-describedby="amenidadesHelp"
        required><?php echo s($proyecto->amenidades); ?></textarea>

    <div class="invalid-feedback"><?php echo $errores['amenidades'] ?? 'Las amenidades del proyecto son obligatorias.'; ?></div>

    <div id="amenidadesHelp" class="form-text">La información de las amenidades debe tener al menos 50 caracteres.</div>
</div>

<div class="mb-3">
    <label for="casas">Casas</label>

    <textarea
        name="proyecto[casas]"
        id="casas"
        rows="3"
        class="form-control <?php echo isset($errores['casas']) ? 'is-invalid' : ''; ?>"
        aria-describedby="casasHelp"
        required><?php echo s($proyecto->casas); ?></textarea>

    <div class="invalid-feedback"><?php echo $errores['casas'] ?? 'Proporcione mas información sobre el proyecto (casas).'; ?></div>

    <div id="casasHelp" class="form-text">La informacion de las casas debe tener al menos 50 caracteres.</div>
</div>