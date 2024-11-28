<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/clienteController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link rel="stylesheet" href="../assets/scss/main.css">
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body class="background-dark-light">
<?php
    require_once '../components/header.php';
    $clienteController = new ClienteController();
    $cliente = $clienteController->buscarPorId($_SESSION["usuario"]);
?>
    <div class="container text-center my-auto">
        <div class="row">
        <h5 class="mt-4 text-start"><a href="javascript:history.back()" class="link-warning">< Voltar</a></h5>
            <div class="col mt-3">
                <a href="#">
                    <img src="../assets/icons/personCircle.svg" alt="Ícone do usuário" width="200" height="200" class="mb-3">
                </a>
                <h2 class="lexend-title-semibold text-warning ms-sm-2 mt-sm-2"><?php echo $cliente['nome_cliente'];?></h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="row shadow p-3 mb-sm-5 bg-dark rounded text-light">
                <div class="col-sm-6 text-start me-5">
                    <h5 class="lexend-title-semibold ms-sm-2 mt-sm-2">Dados do Usuário</h5>
                    <p class="mt-sm-4 ms-sm-2">Suas informações, como nome, email e entre outros.</p>
                </div>
                <div class="col-sm-4 align-self-center text-end d-grid gap-2 ms-sm-5">
                    <a href="../views/dadosUsuario.php?acao=semacao&codCliente=<?php echo $cliente['cod_cliente'];?>" class="btn btn-warning text-light">Visualizar Dados</a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="row shadow p-3 mb-sm-5 bg-dark rounded text-light">
                <div class="col-sm-6 text-start me-5">
                    <h5 class="lexend-title-semibold ms-sm-2 mt-sm-2">Alterar Visibilidade</h5>
                    <p class="mt-sm-4 ms-sm-2">Algumas configurações de como você vê o site.</p>
                </div>
                <div class="col-sm-4 align-self-center text-end d-grid gap-2 ms-sm-5">
                    <a href="#" class="btn btn-warning text-light">Alterar Visibilidade</a>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="row shadow p-3 mb-sm-5 bg-dark rounded text-light">
                <div class="col-sm-6 text-start me-5">
                    <h5 class="lexend-title-semibold ms-sm-2 mt-sm-2">Gerenciar dados</h5>
                    <p class="mt-sm-4 ms-sm-2">Consulte, crie, altere ou exclua registros do banco de dados.</p>
                </div>
                <div class="col-sm-4 align-self-center text-end d-grid gap-2 ms-sm-5">
                    <select class="bg-warning text-white h4 btn" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                        <option value="">Selecione uma tabela...</option>
                        <option value="http://localhost/Projeto_Livraria_Web/src/views/tblCliente.php?acao=semacao">Clientes</option>
                        <option value="http://localhost/Projeto_Livraria_Web/src/views/tblLivro.php?acao=semacao">Livros</option>
                        <option value="http://localhost/Projeto_Livraria_Web/src/views/tblAutor.php?acao=semacao">Autores</option>
                        <option value="http://localhost/Projeto_Livraria_Web/src/views/tblEditora.php?acao=semacao">Editoras</option>
                        <option value="http://localhost/Projeto_Livraria_Web/src/views/tblGenero.php?acao=semacao">Gêneros</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="row shadow p-3 mb-sm-5 bg-dark rounded text-light">
                <div class="col-sm-6 text-start me-5">
                    <h5 class="lexend-title-semibold ms-sm-2 mt-sm-2">Sair da Conta</h5>
                    <p class="mt-sm-4 ms-sm-2">Encerre sua sessão na OpenBook</p>
                </div>
                <div class="col-sm-4 align-self-center text-end d-grid gap-2 ms-sm-5">
                    <a href="../controllers/clienteController.php?acao=sair" class="btn btn-danger text-light">Sair da conta</a>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once '../components/footer.php'; ?>

</html>