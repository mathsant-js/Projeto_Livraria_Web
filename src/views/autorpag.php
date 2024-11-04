<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/autorController.php';
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

    <div class="row mt-5 mx-auto book-carousel">
        <div class="col">
            <h4 class="text-white d-none d-md-block">Livros publicados:</h4>
            <h5 class="text-white d-block d-md-none">Livros publicados:</h5>
        </div>

        <div class="col align-middle text-end">
            <h5 class="d-none d-md-block">
                <a href="" class="link-warning">Ver Todos ➜</a>
            </h5>
            <p class="d-block d-md-none">
                <a href="" class="link-warning">Ver Todos ➜</a>
            </p>
        </div>
    </div>

    <!-- Começo do card -->
    <div class="row book-carousel mx-auto mt-3 column-gap-0">
        <div class="col">
            <a href="#">
                <div class="card book-card bg-dark rounded-5 overflow-hidden">
                    <div class="row border-bottom border-3 border-warning bg-white">
                        <img src="../assets/imgs/static/livroplaceholder.png" alt="book image" class="mx-auto book-card-image">
                        <p class="mb-0">
                            <a href="editorapag.php" class="link-warning ps-3">Editora</a>
                        </p>
                    </div>
                    <div class="row mx-1">
                        <div class="card-body text-white text-center">
                            <h5 class="card-title book-card-title mt-2 text-warning">Título do livro</h5>
                            <p class="small">
                                <a href="autorpag.php" class="link-warning">Nome do autor</a>
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

    <?php require_once '../components/footer.php'; ?>
</body>

</html>