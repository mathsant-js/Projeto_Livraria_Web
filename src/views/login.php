<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Book</title>
    <link rel="stylesheet" href="../assets/scss/main.css">
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body class="align-items-center object-fit-contain background-image-signup">
    <?php require_once '../components/header.php'; ?>
    <div class="row text-center w-100 row-cols-auto mx-auto my-5">
        <div class="col mx-auto my-auto text-center order-2 order-lg-1">
            <img src="../assets/icons/logo.svg" class="signup-logo">
        </div>
        <div class="col border-warning bg-dark text-white my-3 mx-auto p-4 rounded-4 order-1 order-lg-2 mb-1">
            <h5 class="text-start"><a href="javascript:history.back()" class="link-warning">< Voltar</a></h5>
            <form method="POST" action="../controllers/clienteController.php?acao=login" class="text-start">
                <h2 class="text-warning text-center">Bem-vindo de volta!</h2>
                <p class="text-white text-center">Informe seu email de usuário e senha para entrar em sua conta.</p>
                <p class="text-white text-center mt-2">Ainda não possui uma conta? <a href="cadastro.php" class="link-warning">Cadastre-se agora.</a></p>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="email" name="email" placeholder="Email">
                    <label for="email" class="text-warning">Digite seu email</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="senha" name="senha" placeholder="Senha">
                    <label for="senha" class="text-warning">Digite sua senha</label>
                </div>
                <a href="http://gmail.com" class="link-warning mb-3">Esqueci minha senha</a>

                <div class="w-100 text-center">
                    <button type="submit" class="btn btn-warning btn-lg text-white text-center m-3 px-5">Entrar</button>
                </div>
            </form>
        </div>
    </div>

    <?php require_once '../components/footer.php'; ?>
</body>
</html>