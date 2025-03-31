<div class="row justify-content-between mt-3">
    <?php foreach ($proyectos as $proyecto): ?>
        <div class="proyecto col-md-6 mb-4">
            <a href="/proyecto?id=<?php echo s($proyecto->id); ?>">
                <img loading="lazy" src="/uploads/images/<?php echo s($proyecto->imagen); ?>" alt="Portada del Proyecto " class="img-fluid">
                <div class="overlay d-flex flex-column align-items-center justify-content-center text-white">
                    <h2 class="fs-1 titulo"><?php echo s($proyecto->titulo); ?></h2>
                    <h3 class="fs-3 subtitulo"><?php echo s($proyecto->subtitulo); ?></h3>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>