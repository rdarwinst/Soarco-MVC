<main class="container-xl py-5 form-testimoniales">
    <div class="row">
        <div class="col-md-7 mx-auto">
            <h1>Agregar un Comentario</h1>

            <div class="d-grid d-md-flex my-3">
                <a href="/admin" class="btn btn-outline-dark p-3 fw-bold text-uppercase rounded-0">Regresar <i class="bi bi-arrow-return-left"></i></a>
            </div>

            <form method="POST" class=" my-3 py-3" enctype="multipart/form-data" novalidate>

                <?php include __DIR__ . '/formulario.php'; ?>

                <div class="d-grid d-md-flex">
                    <input type="submit" value="Agregar Comentario"
                        class="btn btn-outline-dark mt-3 text-uppercase rounded-0 fw-bold p-3">
                </div>

            </form>
        </div>
    </div>
</main>