<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Book</title>
    <link rel="stylesheet" href="../assets/scss/main.css">
    <link rel="stylesheet" href="../assets/scss/mensagemErro.css">
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body class="background-dark-light">
    <?php require_once '../components/header.php'; ?>
    <div class="container w-100 mx-auto mt-4">
        <h5><a href="javascript:history.back()" class="link-warning">
                < Voltar</a>
        </h5>
        <div class="border-warning bg-dark text-white mx-auto p-4 rounded-4 order-1 order-lg-2 mt-4">
            <form id="clienteForm" method="POST" action="../controllers/clienteController.php?acao=inserir" class="row row-cols-1 row-cols-md-2 text-start mx-md-3">
                <h2 class="text-warning ms-md-3 mb-4 w-100">Dados do Cliente</h2>

                <div class="col-md-12 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nome" name="nome" placeholder="Nome" maxlength="60" required>
                    <label for="nome" class="text-warning ms-3">Nome</label>
                    <span id="erroNome" class="erro"></span>
                </div>
                <div class="col-md-3 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="cpf" name="cpf" placeholder="CPF" maxlength="15" required>
                    <label for="cpf" class="text-warning ms-3">CPF</label>
                    <span id="erroCpf" class="erro"></span>
                </div>
                <div class=" col-md-3 form-floating col mb-3">
                    <input type="date" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="datanasc" name="datanasc" placeholder="Data de Nascimento" required>
                    <label for="datanasc" class="text-warning ms-3">Data de Nascimento</label>
                    <span id="erroDataNascimento" class="erro"></span>
                </div>
                <div class="col-md-6 form-floating col mb-3">
                    <input type="email" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="email" name="email" placeholder="Email" maxlength="100" required>
                    <label for="email" class="text-warning ms-3">Email</label>
                    <span id="erroEmail" class="erro"></span>
                </div>
                <div class="col-md-3 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="telefone" name="telefone" placeholder="Telefone" maxlength="15" required>
                    <label for="telefone" class="text-warning ms-3">Telefone</label>
                    <span id="erroTelefone" class="erro"></span>
                </div>
                <div class="col-md-6 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="endereco" name="endereco" placeholder="Endereço" maxlength="100" required>
                    <label for="endereco" class="text-warning ms-3">Endereço</label>
                    <span id="erroEndereco" class="erro"></span>
                </div>
                <div class="col-md-3 form-floating col mb-4">
                    <input type="password" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="senha" name="senha" placeholder="Senha" maxlength="35" required>
                    <label for="senha" class="text-warning ms-3">Senha</label>
                    <span id="erroSenha" class="erro"></span>
                </div>
                <div class="w-100 text-center text-md-start">
                    <button type="submit" class="btn btn-warning btn-lg text-white text-center px-5">Cadastrar</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Erro de cadastro</h1>
                                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>Preencha novamente os campos</h5>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-warning btn-lg text-light" data-bs-dismiss="modal">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="w-100 mt-1 pt-4">
        <?php require_once '../components/footer.php'; ?>
    </div>
    <script src="../js/validacaoJS/validacaoCliente.js"></script>
</body>

</html>