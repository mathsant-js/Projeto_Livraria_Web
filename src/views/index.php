<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Book</title>
    <link rel="stylesheet" href="../assets/scss/main.css">
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body class="background-dark-light">
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
                    <img src="../assets/imgs/static/imgCarousel1.svg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-warning fs-4">Livros com ótimos preços, sem sair de casa!</h5>
                        <p>Na livraria, você compra seus livros favoritos por preços baixos e justos, e pede para entrega no conforto de sua casa!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/imgs/static/imgCarousel1.svg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-warning">Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/imgs/static/imgCarousel1.svg" class="d-block w-100" alt="...">
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
        <div class="container">
            <div class="row align-items-end justify-content-between text-light mt-sm-5">
                <div class="col-3">
                    <h4 class="mb-5">Lançamentos</h4>
                    <!-- Começo do card -->
                    <div class="row book-carousel mx-auto mt-3 column-gap-0">
                        <div class="col">
                            <a href="#">
                                <div class="card book-card bg-dark rounded-3 overflow-hidden">
                                    <div class="row border-bottom border-3 border-warning bg-white">
                                        <img src="../assets/imgs/static/livroplaceholder.png" alt="book image" class="mx-auto book-card-image">
                                        <p class="mb-0">
                                            <a href="cock" class="link-warning ps-3">Editora</a>
                                        </p>
                                    </div>
                                    <div class="row mx-1">
                                        <div class="card-body text-white text-center">
                                            <h5 class="card-title book-card-title mt-2 text-warning">Título do livro</h5>
                                            <p class="small">
                                                <a href="" class="link-warning">Nome do autor</a>
                                            </p>
                                            <h5 class="card-text">R$ XX,XX</h5>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <a href="#" class="btn btn-warning rounded-3 text-white mb-3 w-100">Comprar</a>
                                                </div>
                                                <div class="col col-auto">
                                                    <a href="">
                                                        <img src="../assets/icons/cartAdd.svg" alt="add to cart" height="40px" width="40px">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Fim do Card -->
                </div>
                <div class="col-3">
                    <!-- Começo do card -->
                    <div class="row book-carousel mx-auto mt-3 column-gap-0">
                        <div class="col">
                            <a href="#">
                                <div class="card book-card bg-dark rounded-3 overflow-hidden">
                                    <div class="row border-bottom border-3 border-warning bg-white">
                                        <img src="../assets/imgs/static/livroplaceholder.png" alt="book image" class="mx-auto book-card-image">
                                        <p class="mb-0">
                                            <a href="cock" class="link-warning ps-3">Editora</a>
                                        </p>
                                    </div>
                                    <div class="row mx-1">
                                        <div class="card-body text-white text-center">
                                            <h5 class="card-title book-card-title mt-2 text-warning">Título do livro</h5>
                                            <p class="small">
                                                <a href="" class="link-warning">Nome do autor</a>
                                            </p>
                                            <h5 class="card-text">R$ XX,XX</h5>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <a href="#" class="btn btn-warning rounded-3 text-white mb-3 w-100">Comprar</a>
                                                </div>
                                                <div class="col col-auto">
                                                    <a href="">
                                                        <img src="../assets/icons/cartAdd.svg" alt="add to cart" height="40px" width="40px">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Fim do Card -->
                </div>
                <div class="col-3">
                    <!-- Começo do card -->
                    <div class="row book-carousel mx-auto mt-3 column-gap-0">
                        <div class="col">
                            <a href="#">
                                <div class="card book-card bg-dark rounded-3 overflow-hidden">
                                    <div class="row border-bottom border-3 border-warning bg-white">
                                        <img src="../assets/imgs/static/livroplaceholder.png" alt="book image" class="mx-auto book-card-image">
                                        <p class="mb-0">
                                            <a href="cock" class="link-warning ps-3">Editora</a>
                                        </p>
                                    </div>
                                    <div class="row mx-1">
                                        <div class="card-body text-white text-center">
                                            <h5 class="card-title book-card-title mt-2 text-warning">Título do livro</h5>
                                            <p class="small">
                                                <a href="" class="link-warning">Nome do autor</a>
                                            </p>
                                            <h5 class="card-text">R$ XX,XX</h5>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <a href="#" class="btn btn-warning rounded-3 text-white mb-3 w-100">Comprar</a>
                                                </div>
                                                <div class="col col-auto">
                                                    <a href="">
                                                        <img src="../assets/icons/cartAdd.svg" alt="add to cart" height="40px" width="40px">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Fim do Card -->
                </div>
                <div class="col-3">
                    <h4 class="text-warning text-end mb-5">Ver Todos</h4>
                    <!-- Começo do card -->
                    <div class="row book-carousel mx-auto mt-3 column-gap-0">
                        <div class="col">
                            <a href="#">
                                <div class="card book-card bg-dark rounded-3 overflow-hidden">
                                    <div class="row border-bottom border-3 border-warning bg-white">
                                        <img src="../assets/imgs/static/livroplaceholder.png" alt="book image" class="mx-auto book-card-image">
                                        <p class="mb-0">
                                            <a href="cock" class="link-warning ps-3">Editora</a>
                                        </p>
                                    </div>
                                    <div class="row mx-1">
                                        <div class="card-body text-white text-center">
                                            <h5 class="card-title book-card-title mt-2 text-warning">Título do livro</h5>
                                            <p class="small">
                                                <a href="" class="link-warning">Nome do autor</a>
                                            </p>
                                            <h5 class="card-text">R$ XX,XX</h5>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <a href="#" class="btn btn-warning rounded-3 text-white mb-3 w-100">Comprar</a>
                                                </div>
                                                <div class="col col-auto">
                                                    <a href="">
                                                        <img src="../assets/icons/cartAdd.svg" alt="add to cart" height="40px" width="40px">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Fim do Card -->
                </div>
            </div>
        </div>
        <div class="row align-items-end justify-content-between text-light mt-sm-5">
            <div class="col-3">
                <h4 class="mb-5">Mais Vendidos</h4>
                <!-- Começo do card -->
                <div class="row book-carousel mx-auto mt-3 column-gap-0">
                    <div class="col">
                        <a href="#">
                            <div class="card book-card bg-dark rounded-3 overflow-hidden">
                                <div class="row border-bottom border-3 border-warning bg-white">
                                    <img src="../assets/imgs/static/livroplaceholder.png" alt="book image" class="mx-auto book-card-image">
                                    <p class="mb-0">
                                        <a href="cock" class="link-warning ps-3">Editora</a>
                                    </p>
                                </div>
                                <div class="row mx-1">
                                    <div class="card-body text-white text-center">
                                        <h5 class="card-title book-card-title mt-2 text-warning">Título do livro</h5>
                                        <p class="small">
                                            <a href="" class="link-warning">Nome do autor</a>
                                        </p>
                                        <h5 class="card-text">R$ XX,XX</h5>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <a href="#" class="btn btn-warning rounded-3 text-white mb-3 w-100">Comprar</a>
                                            </div>
                                            <div class="col col-auto">
                                                <a href="">
                                                    <img src="../assets/icons/cartAdd.svg" alt="add to cart" height="40px" width="40px">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Fim do Card -->
            </div>
            <div class="col-3">
                <!-- Começo do card -->
                <div class="row book-carousel mx-auto mt-3 column-gap-0">
                    <div class="col">
                        <a href="#">
                            <div class="card book-card bg-dark rounded-3 overflow-hidden">
                                <div class="row border-bottom border-3 border-warning bg-white">
                                    <img src="../assets/imgs/static/livroplaceholder.png" alt="book image" class="mx-auto book-card-image">
                                    <p class="mb-0">
                                        <a href="cock" class="link-warning ps-3">Editora</a>
                                    </p>
                                </div>
                                <div class="row mx-1">
                                    <div class="card-body text-white text-center">
                                        <h5 class="card-title book-card-title mt-2 text-warning">Título do livro</h5>
                                        <p class="small">
                                            <a href="" class="link-warning">Nome do autor</a>
                                        </p>
                                        <h5 class="card-text">R$ XX,XX</h5>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <a href="#" class="btn btn-warning rounded-3 text-white mb-3 w-100">Comprar</a>
                                            </div>
                                            <div class="col col-auto">
                                                <a href="">
                                                    <img src="../assets/icons/cartAdd.svg" alt="add to cart" height="40px" width="40px">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Fim do Card -->
            </div>
            <div class="col-3">
                <!-- Começo do card -->
                <div class="row book-carousel mx-auto mt-3 column-gap-0">
                    <div class="col">
                        <a href="#">
                            <div class="card book-card bg-dark rounded-3 overflow-hidden">
                                <div class="row border-bottom border-3 border-warning bg-white">
                                    <img src="../assets/imgs/static/livroplaceholder.png" alt="book image" class="mx-auto book-card-image">
                                    <p class="mb-0">
                                        <a href="cock" class="link-warning ps-3">Editora</a>
                                    </p>
                                </div>
                                <div class="row mx-1">
                                    <div class="card-body text-white text-center">
                                        <h5 class="card-title book-card-title mt-2 text-warning">Título do livro</h5>
                                        <p class="small">
                                            <a href="" class="link-warning">Nome do autor</a>
                                        </p>
                                        <h5 class="card-text">R$ XX,XX</h5>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <a href="#" class="btn btn-warning rounded-3 text-white mb-3 w-100">Comprar</a>
                                            </div>
                                            <div class="col col-auto">
                                                <a href="">
                                                    <img src="../assets/icons/cartAdd.svg" alt="add to cart" height="40px" width="40px">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Fim do Card -->
            </div>
            <div class="col-3">
                <h4 class="text-warning text-end mb-5">Ver Todos</h4>
                <!-- Começo do card -->
                <div class="row book-carousel mx-auto mt-3 column-gap-0">
                    <div class="col">
                        <a href="#">
                            <div class="card book-card bg-dark rounded-3 overflow-hidden">
                                <div class="row border-bottom border-3 border-warning bg-white">
                                    <img src="../assets/imgs/static/livroplaceholder.png" alt="book image" class="mx-auto book-card-image">
                                    <p class="mb-0">
                                        <a href="cock" class="link-warning ps-3">Editora</a>
                                    </p>
                                </div>
                                <div class="row mx-1">
                                    <div class="card-body text-white text-center">
                                        <h5 class="card-title book-card-title mt-2 text-warning">Título do livro</h5>
                                        <p class="small">
                                            <a href="" class="link-warning">Nome do autor</a>
                                        </p>
                                        <h5 class="card-text">R$ XX,XX</h5>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <a href="#" class="btn btn-warning rounded-3 text-white mb-3 w-100">Comprar</a>
                                            </div>
                                            <div class="col col-auto">
                                                <a href="">
                                                    <img src="../assets/icons/cartAdd.svg" alt="add to cart" height="40px" width="40px">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Fim do Card -->
            </div>
        </div>
    </div>
    </div>
</body>
<?php require_once '../components/footer.php'; ?>

</html>