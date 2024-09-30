<?php require_once '../components/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Book</title>
    <link rel="stylesheet" href="../assets/scss/main.css">
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body style="background-image: url('../assets/imgs/static/loginbackground.png'); background-repeat: no-repeat; background-size: cover;" class="align-items-center">
    <div class="row text-center">
        <div class="col my-5 text-center order-2 order-lg-1">
            <img src="../assets/icons/logo.svg" width="600" height="600">
        </div>
        <div class="col border-warning bg-dark text-white my-3 me-5 p-4 rounded-4 order-1 order-lg-2">
            <form class="text-start">
                <h2 class="text-warning text-center">Seja bem-vindo à Open Book!</h2>
                <p class="text-white text-center">Preencha os dados solicitados para criar sua conta.</p>
                <p class="text-white text-center mt-2">Já possui uma conta? <a href="" class="link-warning">Entre agora.</a></p>
                <div class="mb-3 form-floating">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control background-dark-light text-warning border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nome" name="nome">
                </div>

                <div class="mb-3 form-floating">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control background-dark-light text-warning border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="cpf" name="cpf">
                </div>

                <div class="mb-3 form-floating">
                    <label for="datanasc">Data de Nascimento</label>
                    <input type="date" class="form-control background-dark-light text-warning border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="datanasc" name="datanasc">
                </div>

                <div class="mb-3 form-floating">
                    <label for="email">Email</label>
                    <input type="email" class="form-control background-dark-light text-warning border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="email" name="email">
                </div>

                <div class="mb-3 form-floating">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control background-dark-light text-warning border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="telefone" name="telefone">
                </div>

                <div class="mb-3 form-floating">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control background-dark-light text-warning border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="endereco" name="endereco">
                </div>

                <div class="mb-3 form-floating">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control background-dark-light text-warning border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="senha" name="senha">
                </div>

                <div class="mb-3 form-floating">
                    <label for="confsenha">Confirmar senha</label>
                    <input type="password" class="form-control background-dark-light text-warning border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="confsenha" name="confsenha">
                </div>

                <div class="w-100 text-center">
                <button type="submit" class="btn btn-warning btn-lg text-white text-center m-3">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    
</body>
<?php require_once '../components/footer.php'; ?>
</html>