<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/generoController.php';
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
    <div class="container w-100 mx-auto mt-4">
        <h5><a href="javascript:history.back()" class="link-warning">
                < Voltar</a>
        </h5>
        <div class="border-warning bg-dark text-white p-4 mx-auto rounded-4 order-1 order-lg-2 mt-4 overflow-x-scroll">
            <h2 class="text-warning ms-md-3 mb-4">Lista de Gêneros</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $generoController = new GeneroController();
                    $generos = $generoController->listar();

                    foreach ($generos as $genero) {
                    ?>
                        <tr>
                            <td><?php echo $genero['cod_genero']; ?></td>
                            <td><?php echo $genero['nome_genero']; ?></td>
                            <td>
                                <a href="#" class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Exibir Descrição</a>
                            </td>
                            <td>
                                <a href="<?php echo "formGeneroUpdDlt.php?acao=upd&codGenero=" . $genero['cod_genero']; ?>" class="btn btn-warning text-white text-center me-2">Atualizar</a>
                                <a href="<?php echo "formGeneroUpdDlt.php?acao=dlt&codGenero=" . $genero['cod_genero']; ?>" type="submit" class="btn btn-danger text-white text-center px-4">Excluir</a>
                            </td>
                        </tr>
                        </a>
                    <?php } ?>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content bg-dark">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Descrição do Gênero</h1>
                                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h4>Gênero <?php echo $genero['nome_genero'] ?></h4>
                                    <p class="mt-sm-3 text-uppercase"><?php echo $genero['descricao_genero'] ?></p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-warning btn-lg text-light" data-bs-dismiss="modal">Ok</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tbody>
            </table>
        </div>
    </div>

    <div class="w-100 mt-5 pt-5">
        <?php require_once '../components/footer.php'; ?>
    </div>
</body>

</html>