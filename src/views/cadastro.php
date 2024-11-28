<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Book</title>
    <link rel="stylesheet" href="../assets/scss/main.css">
    <link rel="stylesheet" href="../assets/scss/mensagemErro.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/validacaoJS/validacaoCadastro.js"></script>
</head>

<!-- Remover e colocar em um arquivo .js depois -->
<script>
    function verificarCampos(form) {
        if (form.senha.value == form.confsenha.value) {
            return true;
        } else {
            alert("Não foi possível realizar o cadastro. Verifique as informações inseridas e tente novamente.");
            return false;
        }
    }
</script>

<body class="align-items-center object-fit-contain background-image-signup">
    <?php require_once '../components/header.php'; ?>
    <div class="row text-center w-100 row-cols-auto mx-auto">
        <div class="col mx-auto my-auto text-center order-2 order-lg-1">
            <img src="../assets/icons/logo.svg" class="signup-logo">
        </div>
        <div class="col border-warning bg-dark text-white my-3 mx-auto p-4 rounded-4 order-1 order-lg-2">
            <h5 class="text-start"><a href="javascript:history.back()" class="link-warning">< Voltar</a></h5>
            <form id="cadastroForm" method="POST" action="../controllers/clienteController.php?acao=cadastrar" class="text-start" onsubmit="return verificarCampos(this);">
                <h2 class="text-warning text-center">Seja bem-vindo à Open Book!</h2>
                <p class="text-white text-center">Preencha os dados solicitados para criar sua conta.</p>
                <p class="text-white text-center mt-2">Já possui uma conta? <a href="login.php" class="link-warning">Entre agora.</a></p>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nome" name="nome" placeholder="Nome" maxlength="60" required>
                    <label for="nome" class="text-warning">Nome</label>
                    <span id="erroNome" class="erro"></span>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="cpf" name="cpf" placeholder="CPF" maxlength="15" required>
                    <label for="cpf" class="text-warning">CPF</label>
                    <span id="erroCpf" class="erro"></span>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="datanasc" name="datanasc" placeholder="Data de Nascimento" required>
                    <label for="datanasc" class="text-warning">Data de Nascimento</label>
                    <span id="erroDataNascimento" class="erro"></span>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="email" name="email" placeholder="Email" required>
                    <label for="email" class="text-warning">Email</label>
                    <span id="erroEmail" class="erro"></span>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="telefone" name="telefone" placeholder="Telefone" maxlength="15" required>
                    <label for="telefone" class="text-warning">Telefone</label>
                    <span id="erroTelefone" class="erro"></span>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="endereco" name="endereco" placeholder="Endereço" maxlength="100" required>
                    <label for="endereco" class="text-warning">Endereço</label>
                    <span id="erroEndereco" class="erro"></span>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="senha" name="senha" placeholder="Senha" maxlength="35" required>
                    <label for="senha" class="text-warning">Senha</label>
                    <span id="erroSenha" class="erro"></span>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="confsenha" name="confsenha" placeholder="Confirmar Senha" maxlength="35" required>
                    <label for="confsenha" class="text-warning">Confirmar Senha</label>
                    <span id="erroConfirmarSenha" class="erro"></span>
                </div>
                <div class="w-100 text-center">
                    <button type="submit" class="btn btn-warning btn-lg text-white text-center m-3 px-5">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    <?php require_once '../components/footer.php'; ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>
</html>