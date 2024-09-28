<?php require_once '../components/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
</head>

<body class="background-dark-light">
    <div class="container text-center my-auto">
        <div class="row">
            <div class="col mt-sm-5">
                <a href="#">
                    <img src="../assets/icons/personCircle.svg" alt="Ícone do usuário" width="200" height="200">
                </a>
            </div>
        </div>
        <div class="row mt-sm-5">
            <div class="row shadow p-3 mb-sm-5 bg-dark rounded text-light">
                <div class="col-sm-6 text-start me-5">
                    <h5 class="lexend-title-semibold ms-sm-2 mt-sm-2">Dados do Usuário</h5>
                    <p class="mt-sm-4 ms-sm-2">Suas informações, como nome, email e entre outros.</p>
                </div>
                <div class="col-sm-4 align-self-center text-end d-grid gap-2 ms-sm-5">
                    <a href="#" class="btn btn-warning text-light">Visualizar Dados</a>
                </div>
            </div>
        </div>
        <div class="row mt-sm-5">
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
    </div>
</body>
<?php require_once '../components/footer.php'; ?>

</html>