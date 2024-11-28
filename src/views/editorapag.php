<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/editoraController.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/telefoneeditoraController.php';
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
        $editoraController = new EditoraController();
        $editora = $editoraController->buscarPorId($_GET['codEditora']);

        $telefoneeditoraController = new TelefoneEditoraController();
        $telefoneeditora = $telefoneeditoraController->buscarPorId($_GET['codEditora']);

        $livroController = new LivroController();
        $livros = $livroController->buscarPorEditora($_GET['codEditora']);
    ?>
    <div class="background-image-author border-bottom border-5 border-warning">
        <h5 class="pt-4 ps-5 text-start"><a href="javascript:history.back()" class="link-warning">< Voltar</a></h5>
    </div>
    <div class="mx-auto author-div overflow-hidden">
        <div class="card bg-transparent border-0">
            <div class="row column-gap-5">
                <div class="col-md-1 bg-white text-center">
                    <img src="../assets/imgs/static/placeholderlogo.jpg" class="rounded-start bg-white mx-auto" alt="editora" height="200vh" width="200vh">
                </div>
                <div class="col-md-9">
                    <div class="card-body py-4 ps-md-5 ms-md-4 text-center text-md-start">
                        <h2 class="card-title text-warning"><?php echo $editora['nome_editora'];?></h2>
                        <h5 class="card-text text-warning"><?php echo $editora['endereco_editora'];?></h5>
                        <h5 class="card-text text-warning">🕿 <?php echo $telefoneeditora['telefone_editora'];?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="width: 80vw;" class="mx-auto">
        <div class="row justify-content-between text-light mt-3 mt-sm-5">
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