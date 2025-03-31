<main class="container-xl py-5">

    <div class="row">
        <h1 class="text-center">Iniciar Sesión</h1>
        <form action="/login" method="POST" class="needs-validation my-3 col-md-6 mx-auto" novalidate>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                    <input type="email" name="email" id="email" class="form-control <?php echo isset($errores['email']) ? 'is-invalid' : ''; ?>" required>
                    <span class="invalid-feedback"><?php echo $errores['email'] ?? 'El email es obligatorio.'; ?></span>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                    <input type="password" name="password" id="password" class="form-control <?php echo isset($errores['password']) ? 'is-invalid' : ''; ?>" required>
                    <span class="invalid-feedback"><?php echo $errores['password'] ?? 'La contraseña es obligatoria.'; ?></span>
                </div>
            </div>
            <div class="d-grid d-md-flex">
                <input type="submit" value="Iniciar Sesión"
                    class="btn btn-outline-dark p-3 fw-bold text-uppercase mt-3">
            </div>
        </form>
    </div>
</main>