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
    <div class="container w-100 mx-auto mt-4">
        <h5><a href="javascript:history.back()" class="link-warning">< Voltar</a></h5>
        <div class="border-warning bg-dark text-white mx-auto p-4 rounded-4 order-1 order-lg-2 mt-4 overflow-x-scroll">
            <h2 class="text-warning ms-md-3 mb-4">Lista de Autores</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Nacionalidade</th>
                        <th>Data de Nascimento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $autorController = new AutorController();
                        $autores = $autorController->listar();
                        
                        foreach($autores as $autor) {
                    ?>
                        <tr>
                            <td><?php echo $autor['cod_autor'];?></td>
                            <td><?php echo $autor['nome_autor'];?></td>
                            <td><?php echo $autor['nacionalidade_autor'];?></td>
                            <td><?php echo $autor['data_nascimento_autor'];?></td>
                            <td>
                                <a href="<?php echo "formautorUpdDlt.php?acao=upd&codAutor=" . $autor['cod_autor'];?>" class="btn btn-warning text-white text-center me-2">Atualizar</a>
                                <a href="<?php echo "formautorUpdDlt.php?acao=dlt&codAutor=" . $autor['cod_autor'];?>" type="submit" class="btn btn-danger text-white text-center px-4">Excluir</a>
                            </td>
                        </tr>
                    </a>

                    <?php } ?>
                </tbody>
            </table>
            <a href="<?php echo "formAutorCrt.php?acao=crt&codAutor=" . $autor['cod_autor'];?>" class="btn btn-warning btn-lg text-white mt-sm-2">Cadastrar Autor</a>
        </div>
    </div>

    <div class="w-100 mt-5 pt-5">
        <?php require_once '../components/footer.php'; ?>
    </div>
</body>
</html>