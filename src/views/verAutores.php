<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Projeto_Livraria_Web/src/controllers/autorController.php";
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
                <h2 class="text-warning">Autores</h2>
            </div>
        </div>
        <div class="row row-cols-md-4 row-cols-1 justify-content-start text-light mt-sm-4">
            <?php
                $autorController = new AutorController();
                $autores = $autorController->listar();
                foreach ($autores as $autor) { ?>
                    <div class="col-sm-3 col-12 mb-sm-3 mb-2">
                        <div class="row book-carousel mx-auto mt-3 column-gap-0">
                            <div class="col">
                                <div class="card book-card bg-dark rounded-4 overflow-hidden">
                                    <div class="row border-bottom border-3 border-warning bg-white">
                                        <img src="../assets/imgs/static/autorplaceholder.png" alt="author image" class="mx-auto book-card-image" style="cursor: pointer" onclick="location.href = 'http://localhost/Projeto_Livraria_Web/src/views/autorpag.php?acao=semacao&codAutor=<?php echo $autor['cod_autor']; ?>';">
                                    </div>
                                    <div class="row mx-1">
                                        <div class="card-body text-white text-center">
                                            <a href="autorpag.php?acao=semacao&codAutor=<?php echo $autor['cod_autor']; ?>" class="link-warning"><h4 class="card-title book-card-title mt-2 text-warning"><?php echo $autor['nome_autor']; ?></h4></a>
                                            <p class="text-warning"><?php echo $autor['nacionalidade_autor']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php } ?>
        </div>
    </div>
</body>
<?php require_once '../components/footer.php' ?>

</html>