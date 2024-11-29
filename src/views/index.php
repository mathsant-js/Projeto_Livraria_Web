<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/Projeto_Livraria_Web/src/controllers/livroController.php";
?>
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
    <div class="container overflow-x-hidden">
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
                    <img src="../assets/imgs/static/2.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-warning fs-4">Promoção de Natal!</h5>
                        <p>Venha aproveitar a nossa promoção de natal! Presenteie quem você ama com os nossos livros!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../assets/imgs/static/3.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-warning fs-4">Entrega de Livros</h5>
                        <p>Nossas entregas são rápidas e com preços justos! Venha desfrutar da nossa vasta coleção de livros!</p>
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
            <div class="col">
                <h4 class="lexend-title-semibold ms-sm-2">Lançamentos</h4>
            </div>
            <div class="col">
                <a href="../views/livrosCompra.php?acao=semacao" class="link-warning">
                    <h4 class="lexend-title-regular text-warning text-end me-sm-2">Ver Todos ➜</h4>
                </a>
            </div>
        </div>
        <div class="row row-cols-md-4 row-cols-1 justify-content-start text-center text-light mt-sm-4">
            <?php
            $livroController = new LivroController();
            $livros = $livroController->buscarLivro();
            require $_SERVER['DOCUMENT_ROOT'] . "/Projeto_Livraria_Web/src/components/cardLivro.php";
            $cardLivro = new CardLivro();
            foreach (array_slice($livros, 0, 4) as $livro) {
                $card = $cardLivro->carregarCard($livro['editora'], $livro['nome_livro'], $livro['autor'], $livro['preco_livro'], $livro['livro_id'], $livro['codigo_editora'], $livro['codigo_autor']);
            }
            ?>
            <!-- Fim do Card -->
        </div>
        <div class="row mt-sm-5">
        </div>
        <div class="row justify-content-between text-light mt-sm-5">
            <div class="col">
                <h4 class="lexend-title-semibold ms-sm-2">Mais Vendidos</h4>
            </div>
            <div class="col">
                <a href="../views/livrosCompra.php?acao=semacao" class="link-warning">
                    <h4 class="lexend-title-regular text-warning text-end me-sm-2">Ver Todos ➜</h4>
                </a>
            </div>
        </div>
        <div class="row row-cols-md-4 row-cols-1 justify-content-start text-center text-light mt-sm-4">
            <?php
            foreach (array_slice($livros, 0, 4) as $livro) {
                $card = $cardLivro->carregarCard($livro['editora'], $livro['nome_livro'], $livro['autor'], $livro['preco_livro'], $livro['livro_id'], $livro['codigo_editora'], $livro['codigo_autor']);
            }
            ?>
        </div>
    </div>
    </div>
</body>
<?php require_once '../components/footer.php'; ?>

</html>