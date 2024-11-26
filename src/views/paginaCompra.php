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

<body class="background-dark-light">
    <?php require_once "../components/header.php"; ?>
    <div class="container">
        <div class="row">
            <div class="col mt-sm-5">
                <h5><a href="javascript:history.back()" class="link-warning">
                        < Voltar</a>
                </h5>
                <div class="shadow p-3 mb-5 mt-sm-5 bg-dark rounded text-light">
                    <?php
                        $livroController = new LivroController();
                        $livro = $livroController->buscarLivroParaCompra($_GET['codLivro']);
                    ?>
                    <div class="row">
                        <div class="col">
                            <img src="../assets/imgs/static/livroplaceholder.png" alt="Imagem do Livro" class="bg-white book-buy-image mx-auto">
                        </div>
                        <div class="col">
                            <ul class="navbar-nav">
                                <li class="text-warning fs-4 mb-sm-2"><?php echo $livro['nome_livro'] ?></li>
                                <li class="my-sm-2 fs-5">Autor: <?php echo $livro['autor'] ?></li>
                                <li class="my-sm-2 fs-5">Editora: <?php echo $livro['editora'] ?></li>
                                <li class="my-sm-2 fs-5">Gênero: <?php echo $livro['genero'] ?></li>
                                <li class="text-warning fs-4">R$ <?php echo $livro['preco_livro'] ?></li>
                            </ul>
                            <p class="text-break mt-sm-3">Descrição: <?php echo $livro['descricao_livro'] ?></p>
                            <a href=<?php echo "formaPagamento.php?acao=semacao&codLivro=" . $_GET['codLivro']; ?> class="btn btn-warning btn-lg text-light me-sm-5 mb-3 mb-md-0">Comprar</a>
                            <button class="btn btn-warning btn-lg text-light">Adicionar ao Carrinho</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once "../components/footer.php"; ?>

</html>