<main class="container-xl py-5 form-proyecto">

    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1>Actualizar un Proyecto</h1>
            <div class="d-grid d-md-flex my-3">
                <a href="/admin" class="btn btn-outline-dark p-3 fw-bold text-uppercase rounded-0">Regresar <i class="bi bi-arrow-return-left"></i></a>
            </div>

            <form method="POST" enctype="multipart/form-data" novalidate>

                <?php include __DIR__ . '/formulario.php'; ?>

                <div class="d-grid d-md-flex my-3">
                    <input type="submit" value="Actualizar Proyecto" class="btn btn-outline-dark text-uppercase fw-bold p-3 rounded-0">
                </div>
            </form>

        </div>

    </div>

</main>