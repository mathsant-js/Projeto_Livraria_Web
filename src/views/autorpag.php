<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/autorController.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/livroController.php';
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
    <?php require_once '../components/header.php'; ?>
    <?php 
        $autorController = new AutorController();
        $autor = $autorController->buscarPorId($_GET['codAutor']);

        $livroController = new LivroController();
        $livros = $livroController->buscarPorAutor($_GET['codAutor']);
    ?>
    <div class="background-image-author border-bottom border-5 border-warning"></div>
    <div class="text-center">
        <div class="mx-auto author-div">
            <img src="../assets/imgs/static/autorplaceholder.png" class="author-image">
            <h1 class="text-warning mt-3"><?php echo $autor['nome_autor'];?></h1>
            <h4 class="text-warning mt-1 d-none d-md-block"><?php echo $autor['nacionalidade_autor'] . " • ★ " . $autor['data_nascimento_autor'] . " • 🕇 " . $autor['data_falecimento_autor'];?></h4>
            <h4 class="text-warning mt-1 d-block d-md-none"><?php echo $autor['nacionalidade_autor'] . "<br>★ " . $autor['data_nascimento_autor'] . "<br>🕇 " . $autor['data_falecimento_autor'];?></h4>

            <p class="text-white mt-3 mx-lg-5 mx-3 text-start pb-4">
                <?php echo $autor['biografia_autor'];?>
            </p>
        </div>
    </div>

    <div style="width: 80vw;" class="mx-auto">
        <div class="row justify-content-between text-light mt-sm-5">
            <div class="col">
                <h3 class="lexend-title-semibold ms-sm-2">Livros publicados</h3>
            </div>
        </div>
        <div class="row row-cols-md-4 row-cols-1 justify-content-start text-center text-light mt-sm-4">
            <?php
            require $_SERVER['DOCUMENT_ROOT'] . "/Projeto_Livraria_Web/src/components/cardLivro.php";
            $cardLivro = new CardLivro();
            foreach ($livros as $livro) {
                $card = $cardLivro->carregarCard($livro['editora'], $livro['nome_livro'], $livro['autor'], $livro['preco_livro'], $livro['livro_id'], $livro['codigo_editora'], $livro['codigo_autor']);
            }
            ?>
        </div>
    </div>

    <?php require_once '../components/footer.php'; ?>
</body>

</html>