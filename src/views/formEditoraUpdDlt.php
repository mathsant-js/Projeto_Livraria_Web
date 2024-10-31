<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/editoraController.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/telefoneeditoraController.php';
    
    switch ($_GET['acao']) {
        case "upd":
            $act = "atualizar";
            break;
        case "dlt":
            $act = "excluir";
            break;
        default:
            $act = "atualizar";
            break;
    }
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
        <div class="border-warning bg-dark text-white mx-auto p-4 rounded-4 order-1 order-lg-2 mt-4">
            <?php 
                $editoraController = new EditoraController();
                $editora = $editoraController->buscarPorId($_GET['codEditora']);

                $telefoneeditoraController = new TelefoneEditoraController();
                $telefoneeditora = $telefoneeditoraController->buscarPorId($_GET['codEditora']);
            ?>
            <form method="POST" action="<?php echo "../controllers/editoraController.php?acao=" . $act?>" class="row row-cols-1 row-cols-md-2 text-start mx-md-3">
                <h2 class="text-warning ms-md-3 mb-4 w-100">Dados da Editora</h2>
                
                <div class="col-md-2 form-floating col mb-3">
                    <input type="number" class="form-control text-warning background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="codigo" name="codigo" placeholder="Código" required readonly value="<?php echo $editora['cod_editora'];?>">
                    <label for="codigo" class="ms-3">Código</label>
                </div>
                <div class="col-md-10 form-floating col mb-3">
                    <input type="text" class="form-control text-warning background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nome" name="nome" placeholder="Nome" required value="<?php echo $editora['nome_editora'];?>" >
                    <label for="nome" class="ms-3">Nome</label>
                </div>
                <div class="form-floating col mb-4">
                    <input type="text" class="form-control text-warning background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="endereco" name="endereco" placeholder="Endereço" required value="<?php echo $editora['endereco_editora'];?>" >
                    <label for="endereco" class="ms-3">Endereço</label>
                </div>
                <div class="form-floating col mb-4">
                    <input type="text" class="form-control text-warning background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="telefone" name="telefone" placeholder="Telefone" required value="<?php echo $telefoneeditora['telefone_editora'];?>" >
                    <label for="telefone" class="ms-3">Telefone</label>
                </div>
                <div class="w-100 text-center text-md-start">
                    <button type="submit" class="btn btn-warning btn-lg text-white text-center px-5"
                        <?php
                            if ($_GET['acao'] == "upd" || $_GET['acao'] == "dlt") {
                                echo "hidden";
                            }
                        ?>>Cadastrar</button>

                    <button type="submit" class="btn btn-warning btn-lg text-white text-center px-5"
                        <?php
                            if ($_GET['acao'] == "crt" || $_GET['acao'] == "dlt") {
                                echo "hidden";
                            }
                        ?>>Atualizar</button>

                    <button type="submit" class="btn btn-danger btn-lg text-white text-center px-5"
                        <?php
                            if ($_GET['acao'] == "upd" || $_GET['acao'] == "crt") {
                                echo "hidden";
                            }
                        ?>>Excluir</button>
                </div>

            </form>
        </div>
    </div>

    <div class="w-100 mt-5 pt-5">
        <?php require_once '../components/footer.php'; ?>
    </div>
</body>
</html>