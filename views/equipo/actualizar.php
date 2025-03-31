<main class="container-xl py-5 form-equipo">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h1>Actualizar Información Persona</h1>
            <div class="my-3 d-grid d-md-flex">
                <a href="/admin" class="btn btn-outline-dark p-3 fw-bold text-uppercase rounded-0">Regresar <i
                        class="bi bi-arrow-return-left"></i></a>
            </div>
            <form method="POST" enctype="multipart/form-data" novalidate>

                <?php include __DIR__ . '/formulario.php' ?>

                <div class="my-3 d-grid d-md-flex">
                    <input type="submit" value="Actualizar Información"
                        class="btn btn-outline-dark fw-bold p-3 text-uppercase rounded-0">
                </div>
            </form>
        </div>
    </div>
</main>
