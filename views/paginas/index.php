<section class="video">
    <div class="overlay py-5">
        <div class="d-flex flex-column h-100 justify-content-center align-items-center">
            <h2 class="text-white text-center fs-1">Somos una gran fabrica de imaginación</h2>
            <p class="text-white text-center fs-5">Hacemos arquitectura que deleita tus sentidos y optimiza tu
                bienestar.</p>
            <a href="#proyectos" class="btn btn-dark fs-6 p-3 text-uppercase fw-bold mt-2">Proyectos en
                ejecución</a>
        </div>
    </div>

    <video autoplay muted loop class="object-fit-cover">
        <source src="video/hero.mp4" type="video/mp4">
        <source src="video/hero.ogv" type="video/ogg">
        <source src="video/hero.webm" type="video/webm">
    </video>
</section>

<main class="container-xl py-5 proyectos" id="proyectos">
    <h1>Proyectos en Ejecución</h1>

    <?php include __DIR__ . '/listado.php'; ?>

    <a href="/proyectos" class="btn btn-outline-dark my-4 p-3 fw-bold text-uppercase d-block d-md-inline-block">Ver más
        proyectos</a>
</main>

<section class="nosotros bg-light">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col-md-7 mb-4 mb-md-0">
                <h2 class="fs-2">Sobre Nosotros</h2>
                <p class="mt-2">En Constructora Soarco SAS, nos especializamos en transformar sus sueños
                    inmobiliarios en realidad. Con
                    un equipo de expertos comprometidos, ofrecemos un servicio personalizado y soluciones
                    efectivas
                    para
                    cada necesidad. Su próxima propiedad está a solo un paso de distancia. ¡Descúbrala con
                    nosotros!
                </p>
                <a href="/nosotros"
                    class="btn btn-dark mt-2 p-3 text-uppercase fw-bold d-block d-md-inline-block">Conocer
                    Más</a>
            </div>
            <div class="col-md-4 offset-md-1">
                <picture>
                    <source srcset="/build/img/nosotros.avif" type="image/avif">
                    <source srcset="/build/img/nosotros.webp" type="image/webp">
                    <source srcset="/build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" width="200" height="300" src="/build/img/nosotros.jpg"
                        alt="Imagen Nosotros" class="img-fluid imagen">
                </picture>
            </div>
        </div>
    </div>
</section>

<section class="py-5 container-xl testimoniales">
    <div class="row align-items-center">
        <div class="col-md-4 order-2 order-md-1">
            <img loading="lazy" width="200" height="300" src="/build/img/opinion.svg" alt="Imagen Testimoniales"
                class="img-fluid">
        </div>
        <div class="col-md-8 order-1 order-md-2">
            <h2 class="mt-5">Experiencias de nuestros clientes</h2>
            <div class="row mt-5">        
                <?php foreach ($testimonios as $index => $testimonio): ?>
                    <?php $offset = $offsets[$index % 3]; ?>                    
                    <div class="col-md-6 mb-2 offset-md-<?php echo $offset; ?>">
                        <div class="testimonial bg-dark">
                            <blockquote class="text-white"><?php echo s($testimonio->testimonio); ?></blockquote>
                            <p class="text-end fst-italic text-white"> - <?php echo s($testimonio->nombre) . " " . s($testimonio->apellido); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container-xl">
        <h2 class="text-center">¡Suscríbete a Nuestro Boletín!
        </h2>
        <p class="text-center w-75 mx-auto">Mantente informado sobre las últimas novedades, ofertas exclusivas y contenido especial. ¡No te pierdas nada y únete a nuestra comunidad hoy mismo!
        </p>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form class="my-3">
                    <div class="row g-0 justify-content-center">
                        <div class="col-sm-8">
                            <input type="email" name="email" id="email" class="form-control py-3 rounded-0" placeholder="name@example.com">
                        </div>
                        <div class="col-sm-4 d-grid d-md-flex">
                            <input type="submit" value="Suscribirme" class="btn btn-dark py-3 rounded-0 text-uppercase fs-6 fw-bold">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>