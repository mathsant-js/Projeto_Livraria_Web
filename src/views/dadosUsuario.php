<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/clienteController.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/emailclienteController.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/telefoneclienteController.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/enderecoclienteController.php';
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

<!-- Remover e colocar em um arquivo .js depois -->
<script>
    function verificarCampos(form) {
        if (form.senha.value == form.confsenha.value) {
            return true;
        } else {
            alert("Não foi possível atualizar o cadastro. Verifique se a senha está correta e se a confirmação é igual.");
            return false;
        }
    }
</script>

<body class="background-dark-light">
<?php require_once '../components/header.php' ?>
    <div class="container text-light">
        <div class="row mt-sm-4 justify-content-between">
            <div class="col my-3 text-center">
                <h5 class="text-start"><a href="javascript:history.back()" class="link-warning">< Voltar</a></h5>
                <div class="row mt-sm-5">
                    <div class="col-12 mb-md-0 mb-4">
                        <a href="#">
                            <img src="../assets/icons/personCircle.svg" alt="Foto do Usuário" width="300rem" height="300rem">
                        </a>
                    </div>
                    <div class="col mt-sm-5">
                        <a href="#" class="btn btn-warning btn-lg text-light px-sm-3">
                            <img src="../assets/icons/camera.svg" alt="Ícone de uma câmera">
                            Editar Foto
                        </a>
                    </div>
                </div>
            </div>
            <div class="col border-warning bg-dark text-white my-3 mx-auto p-4 rounded-4 order-1 order-lg-2">
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
                <form method="POST" action="../controllers/clienteController.php?acao=atualizarproprio&codigo=<?php echo $_GET['codCliente']; ?>" class="text-start" onsubmit="return verificarCampos(this);">
                    <h2 class="text-warning text-center">Dados do Usuário</h2>
                    <p class="text-white text-center mb-sm-4">Veja os seus dados aqui, você também pode editá-los</p>
                    <!-- Início dos Campos -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nome" name="nome" placeholder="Nome" required value="<?php echo $cliente['nome_cliente'];?>">
                        <label for="nome" class="text-warning">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="cpf" name="cpf" placeholder="CPF" required value="<?php echo $cliente['cpf_cliente'];?>">
                        <label for="cpf" class="text-warning">CPF</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="datanasc" name="datanasc" placeholder="Data de Nascimento" required value="<?php echo $cliente['data_nascimento_cliente'];?>">
                        <label for="datanasc" class="text-warning">Data de Nascimento</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="email" name="email" placeholder="Email" required value="<?php echo $emailcliente['email_cliente'];?>">
                        <label for="email" class="text-warning">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="telefone" name="telefone" placeholder="Telefone" required value="<?php echo $telefonecliente['telefone_cliente'];?>">
                        <label for="text" class="text-warning">Telefone</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="endereco" name="endereco" placeholder="Endereço" required value="<?php echo $enderecocliente['endereco_cliente'];?>">
                        <label for="text" class="text-warning">Endereço</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="senha" name="senha" placeholder="Senha" required value="<?php echo $cliente['senha_cliente'];?>">
                        <label for="senha" class="text-warning">Senha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="confsenha" name="confsenha" placeholder="Confirmar Senha" required>
                        <label for="confsenha" class="text-warning">Confirmar Senha</label>
                    </div>
                    <div class="w-100 text-center">
                        <button type="submit" class="btn btn-warning btn-lg text-white text-center m-3">Atualizar Dados</button>
                    </div>
                </form>
                <p class="text-white text-start mt-2">
                    <a href="" class="link-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Deletar conta
                    </a>
                </p>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar a Conta</h1>
                                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Você tem certeza que você irá deletar a sua conta?
                                <p class="mt-sm-3 text-uppercase">Você perderá o seu cadastro na Open Book.</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-warning text-light" data-bs-dismiss="modal">Quero manter a conta</button>
                                <button type="button" class="btn btn-danger">Deletar Conta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once '../components/footer.php' ?>

</html>