<?php
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
    <?php require_once "../components/header.php"; ?>
    <div class="container w-100 mx-auto mt-4">
        <h5><a href="javascript:history.back()" class="link-warning">
                < Voltar</a>
        </h5>
        <div class="border-warning bg-dark text-white p-4 mx-auto rounded-4 order-1 order-lg-2 mt-4 overflow-x-scroll">
            <h2 class="text-warning ms-md-3 mb-4">Lista de Livros</h2>

            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>ISBN</th>
                        <th>Data de Lançamento</th>
                        <th>Mais Informações</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $livroController = new LivroController();
                    $livros = $livroController->listar();

                    foreach ($livros as $livro) {
                    ?>
                    
                        <tr>
                            <td><?php echo $livro['cod_livro']; ?></td>
                            <td><?php echo $livro['nome_livro']; ?></td>
                            <td><?php echo $livro['isbn_livro']; ?></td>
                            <td><?php echo $livro['data_lancamento']; ?></td>
                            <td>
                                <a href="#" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Exibir Mais
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo "formLivroUpdDlt.php?acao=upd&codLivro=" . $livro['cod_livro']; ?>" class="btn btn-warning text-white text-center me-2">Atualizar</a>
                                <a href="<?php echo "formLivroUpdDlt.php?acao=dlt&codLivro=" . $livro['cod_livro']; ?>" type="submit" class="btn btn-danger text-white text-center px-4">Excluir</a>
                            </td>
                        </tr>
                        </a>

                    <?php } ?>
                </tbody>
            </table>
            <a href="<?php echo "formLivroCrt.php?acao=crt&codLivro=" . $livro['cod_livro']; ?>" class="btn btn-warning btn-lg text-white mt-sm-2">Cadastrar Livro</a>
        </div>
    </div>
    <div class="w-100 mt-5 pt-5">
        <?php require_once "../components/footer.php"; ?>
    </div>
</body>

</html>