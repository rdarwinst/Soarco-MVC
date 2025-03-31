<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input
        type="text"
        name="equipo[nombre]"
        id="nombre"
        class="form-control <?php echo isset($errores['nombre']) ? 'is-invalid' : ''; ?>"
        value="<?php echo s($persona->nombre); ?>"
        required>
    <div class="invalid-feedback"><?php echo $errores['nombre'] ?? 'El nombre es obligatorio.'; ?></div>
</div>

<div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input
        type="text"
        name="equipo[apellido]"
        id="apellido"
        class="form-control <?php echo isset($errores['apellido']) ? 'is-invalid' : ''; ?>"
        value="<?php echo s($persona->apellido); ?>"
        required>
    <div class="invalid-feedback"><?php echo $errores['apellido'] ?? 'El apellido es obligatorio.'; ?></div>
</div>

<div class="mb-3">
    <label for="cargo" class="form-label">Cargo</label>
    <input
        type="text"
        name="equipo[cargo]"
        id="cargo"
        class="form-control <?php echo isset($errores['cargo']) ? 'is-invalid' : ''; ?>"
        value="<?php echo s($persona->cargo); ?>"
        required>
    <div class="invalid-feedback"><?php echo $errores['cargo'] ?? 'Debe ingresar el cargo que ocupa la persona.'; ?></div>
</div>

<div class="mb-3">
    <label for="correo" class="form-label">Correo Electrónico</label>
    <input
        type="email"
        name="equipo[correo]"
        id="correo"
        class="form-control <?php echo isset($errores['correo']) ? 'is-invalid' : ''; ?>"
        value="<?php echo s($persona->correo); ?>"
        required>
    <div class="invalid-feedback"><?php echo $errores['correo'] ?? 'El correo electrónico es obligatorio.'; ?></div>
</div>

<div class="mb-3">
    <label for="telefono" class="form-label">Teléfono</label>
    <input
        type="tel"
        name="equipo[telefono]"
        id="telefono"
        class="form-control <?php echo isset($errores['telefono']) ? 'is-invalid' : ''; ?>"
        value="<?php echo s($persona->telefono); ?>">
    <?php if (isset($errores['telefono'])): ?>
        <div class="invalid-feedback"><?php echo s($errores['telefono']); ?></div>
    <?php endif; ?>
</div>

<div class="mb-3">
    <label for="imagen" class="form-label">Fotografía</label>
    <input
        type="file"
        name="equipo[imagen]"
        id="imagen"
        class="form-control <?php echo isset($errores['imagen']) ? 'is-invalid' : ''; ?>"
        accept="image/jpeg, image/png"
        required>

    <div class="invalid-feedback"><?php echo $errores['imagen'] ?? 'Debe añadir una imagen.'; ?></div>
</div>

<?php if ($persona->imagen): ?>
    <div class="mb-3">
        <p>Imagen Actual</p>
        <img src="/uploads/images/<?php echo s($persona->imagen); ?>" alt="Fotografía <?php echo s($persona->nombre) . " " . s($persona->apellido); ?>" class="img-fluid" title="Foto de <?php echo s($persona->nombre) . " " . s($persona->apellido); ?>">
    </div>
<?php endif; ?>