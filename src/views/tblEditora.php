<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/editoraController.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/telefoneeditoraController.php';
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
        <div class="border-warning bg-dark text-white p-4 mx-auto rounded-4 order-1 order-lg-2 mt-4 overflow-x-scroll">
            <h2 class="text-warning ms-md-3 mb-4">Lista de Editoras</h2>

            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $editoraController = new EditoraController();
                        $editoras = $editoraController->listar();

                        $telefoneeditoraController = new TelefoneEditoraController();
                        
                        foreach($editoras as $editora) {
                            $telefoneeditora = $telefoneeditoraController->buscarPorId($editora['cod_editora']);
                    ?>
                        <tr>
                            <td><?php echo $editora['cod_editora'];?></td>
                            <td><?php echo $editora['nome_editora'];?></td>
                            <td><?php echo $editora['endereco_editora'];?></td>
                            <td><?php echo $telefoneeditora['telefone_editora'];?></td>
                            <td>
                                <a href="<?php echo "formEditoraUpdDlt.php?acao=upd&codEditora=" . $editora['cod_editora'];?>" class="btn btn-warning text-white text-center me-2">Atualizar</a>
                                <a href="<?php echo "formEditoraUpdDlt.php?acao=dlt&codEditora=" . $editora['cod_editora'];?>" type="submit" class="btn btn-danger text-white text-center px-4">Excluir</a>
                            </td>
                        </tr>
                    </a>

                    <?php } ?>
                </tbody>
            </table>
            <a href="formEditoraCrt.php?acao=crt" class="btn btn-warning btn-lg text-white mt-sm-2">Cadastrar Editora</a>
        </div>
    </div>

    <div class="w-100 mt-5 pt-5">
        <?php require_once '../components/footer.php'; ?>
    </div>
</body>
</html>