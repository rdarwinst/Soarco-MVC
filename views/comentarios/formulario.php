<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
        <input
            type="text"
            name="testimonial[nombre]"
            id="nombre"
            class="form-control <?php echo isset($errores['nombre']) ? 'is-invalid' : ''; ?>"
            value="<?php echo s($testimonio->nombre); ?>"
            required>
        <span class="invalid-feedback"><?php echo $errores['nombre'] ?? 'Tu nombre es obligatorio.'; ?></span>
    </div>
</div>

<div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
        <input
            type="text"
            name="testimonial[apellido]"
            id="apellido"
            class="form-control <?php echo isset($errores['apellido']) ? 'is-invalid' : ''; ?>"
            value="<?php echo s($testimonio->apellido); ?>"
            required>
        <span class="invalid-feedback"><?php echo $errores['apellido'] ?? 'Tu apellido es obligatorio.'; ?></span>
    </div>
</div>

<div class="mb-3">
    <label for="proyecto_id" class="form-label">Proyecto</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-house-door-fill"></i></span>
        <select name="testimonial[proyecto_id]" id="proyecto_id" class="form-select <?php echo isset($errores['proyecto']) ? 'is-invalid' : ''; ?>" required>
            <option selected disabled value="">Seleccionar un proyecto</option>
            <?php foreach ($proyectos as $proyecto): ?>
                <option
                    <?php echo $proyecto->id === $testimonio->proyecto_id ? 'selected' : ''; ?>
                    value="<?php echo s($proyecto->id); ?>"><?php echo s($proyecto->titulo); ?></option>
            <?php endforeach; ?>
        </select>
        <span class="invalid-feedback"><?php echo $errores['proyecto'] ?? 'Debes elegir un proyecto para dejar tu opinión.'; ?></span>
    </div>
</div>

<div class="mb-3">
    <label for="testimonio" class="form-label">Tu Opinión</label>
    <div class="input-group">
        <span class="input-group-text"><i class="bi bi-chat-square-text-fill"></i></span>
        <textarea
            name="testimonial[testimonio]"
            id="testimonio"
            rows="5"
            class="form-control <?php echo isset($errores['testimonio']) ? 'is-invalid' : ''; ?>"
            aria-describedby="testimonioHelp"
            required><?php echo s($testimonio->testimonio); ?></textarea>
        <span class="invalid-feedback"><?php echo $errores['testimonio'] ?? 'Debes escribir algún comentario.'; ?></span>
    </div>
    <div class="form-text" id="testimonioHelp">El comentario debe tener al menos 50 caracteres.</div>
</div>