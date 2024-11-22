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
    <?php require_once '../components/header.php' ?>
    <div class="container mt-sm-5 text-light">
        <div class="row">
            <div class="col text-start">
                <h5><a href="javascript:history.back()" class="link-warning">
                        < Voltar</a>
                </h5>
            </div>
        </div>
        <div class="row mt-sm-3 justify-content-between">
            <div class="col mt-sm-3 text-start lexend-title-semibold">
                <h2 class="text-warning">Livros para Compra</h2>
            </div>
            <div class="col mt-sm-3 me-sm-4 text-end">
                <a href="#" class="btn btn-warning btn-lg text-light">Filtrar</a>
            </div>
        </div>
        <div class="row row-cols-md-4 row-cols-1 justify-content-start text-light mt-sm-4">
            <?php
            $livroController = new LivroController();
            $livros = $livroController->buscarLivro();
            require $_SERVER['DOCUMENT_ROOT'] . "/Projeto_Livraria_Web/src/components/cardLivro.php";
            $cardLivro = new CardLivro();
            foreach ($livros as $livro) {
                $card = $cardLivro->carregarCard($livro['editora'], $livro['nome_livro'], $livro['autor'], $livro['preco_livro'], $livro['livro_id']);
            }
            ?>
        </div>
    </div>
</body>
<?php require_once '../components/footer.php' ?>

</html>