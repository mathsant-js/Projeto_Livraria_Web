<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/clienteController.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/emailclienteController.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/telefoneclienteController.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/enderecoclienteController.php';
    
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
                $clienteController = new ClienteController();
                $cliente = $clienteController->buscarPorId($_GET['codCliente']);

                $emailclienteController = new EmailClienteController();
                $emailcliente = $emailclienteController->buscarPorId($_GET['codCliente']);

                $telefoneclienteController = new TelefoneClienteController();
                $telefonecliente = $telefoneclienteController->buscarPorId($_GET['codCliente']);

                $enderecoclienteController = new EnderecoClienteController();
                $enderecocliente = $enderecoclienteController->buscarPorId($_GET['codCliente']);
            ?>
            <form method="POST" action="<?php echo "../controllers/clienteController.php?acao=" . $act?>" class="row row-cols-1 row-cols-md-2 text-start mx-md-3">
                <h2 class="text-warning ms-md-3 mb-4 w-100">Dados do Cliente</h2>
                
                <div class="col-md-2 form-floating col mb-3">
                    <input type="number" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="codigo" name="codigo" placeholder="Código" readonly value="<?php echo $cliente['cod_cliente'];?>">
                    <label for="codigo" class="text-warning ms-3">Código</label>
                </div>
                <div class="col-md-10 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nome" name="nome" placeholder="Nome" required value="<?php echo $cliente['nome_cliente'];?>">
                    <label for="nome" class="text-warning ms-3">Nome</label>
                </div>
                <div class="col-md-3 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="cpf" name="cpf" placeholder="CPF" required value="<?php echo $cliente['cpf_cliente'];?>">
                    <label for="cpf" class="text-warning ms-3">CPF</label>
                </div>
                <div class=" col-md-3 form-floating col mb-3">
                    <input type="date" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="datanasc" name="datanasc" placeholder="Data de Nascimento" required value="<?php echo $cliente['data_nascimento_cliente'];?>">
                    <label for="datanasc" class="text-warning ms-3">Data de Nascimento</label>
                </div>
                <div class="col-md-6 form-floating col mb-3">
                    <input type="email" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="email" name="email" placeholder="Email" required value="<?php echo $emailcliente['email_cliente'];?>">
                    <label for="email" class="text-warning ms-3">Email</label>
                </div>
                <div class="col-md-3 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="telefone" name="telefone" placeholder="Telefone" required value="<?php echo $telefonecliente['telefone_cliente'];?>">
                    <label for="telefone" class="text-warning ms-3">Telefone</label>
                </div>
                <div class="col-md-6 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="endereco" name="endereco" placeholder="Endereço" required value="<?php echo $enderecocliente['endereco_cliente'];?>">
                    <label for="endereco" class="text-warning ms-3">Endereço</label>
                </div>
                <div class="col-md-3 form-floating col mb-4">
                    <input type="password" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="senha" name="senha" placeholder="Senha" required value="<?php echo $cliente['senha_cliente'];?>">
                    <label for="senha" class="text-warning ms-3">Senha</label>
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

    <div class="w-100 mt-1 pt-4">
        <?php require_once '../components/footer.php'; ?>
    </div>
</body>
</html>