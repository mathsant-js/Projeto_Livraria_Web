<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Book</title>
    <link rel="stylesheet" href="../assets/scss/main.css">
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body class="background-dark-light overflow-x-hidden">
    <?php require_once '../components/header.php'; ?>
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide container mt-5">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/imgs/static/imgCarouselWithFade.svg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-warning fs-4">Livros com ótimos preços, sem sair de casa!</h5>
                        <p>Na livraria, você compra seus livros favoritos por preços baixos e justos, e pede para entrega no conforto de sua casa!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/imgs/static/imgCarouselWithFade.svg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-warning">Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/imgs/static/imgCarouselWithFade.svg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-warning">Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="row justify-content-between text-light mt-sm-5">
            <div class="col-sm-4">
                <h4 class="lexend-title-semibold ms-sm-2">Lançamentos</h4>
            </div>
            <div class="col-sm-4">
                <h4 class="lexend-title-regular text-warning text-end me-sm-2">Ver Todos</h4>
            </div>
        </div>
        <div class="row justify-content-center text-center text-light mt-sm-5">
            <div class="col-sm-3">
                Column
            </div>
            <div class="col-sm-3">
                Column
            </div>
            <div class="col-sm-3">
                Column
            </div>
            <div class="col-sm-3">
                Column
            </div>
        </div>
        <div class="row justify-content-between text-light mt-sm-5">
            <div class="col-sm-4">
                <h4 class="lexend-title-semibold ms-sm-2">Mais Vendidos</h4>
            </div>
            <div class="col-sm-4">
                <h4 class="lexend-title-regular text-warning text-end me-sm-2">Ver Todos</h4>
            </div>
        </div>
        <div class="row justify-content-center text-center text-light mt-sm-5">
            <div class="col-sm-3">
                Column
            </div>
            <div class="col-sm-3">
                Column
            </div>
            <div class="col-sm-3">
                Column
            </div>
            <div class="col-sm-3">
                Column
            </div>
        </div>
    </div>
</body>
<?php require_once '../components/footer.php'; ?>

</html>