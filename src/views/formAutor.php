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
    <div class="container w-100 mx-auto mt-5">
        <div class="border-warning bg-dark text-white mx-auto p-4 rounded-4 order-1 order-lg-2">
            <form class="row row-cols-1 row-cols-md-2 text-start mx-md-3">
                <h2 class="text-warning ms-md-3 mb-4 w-100">Dados de Autores</h2>
                
                <div class="col-md-2 form-floating col mb-3">
                    <input type="number" class="form-control text-warning background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="codigo" name="codigo" placeholder="Código" required>
                    <label for="codigo" class="ms-3">Código</label>
                </div>
                <div class="col-md-10 form-floating col mb-3">
                    <input type="text" class="form-control text-warning background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nome" name="nome" placeholder="Nome" required>
                    <label for="nome" class="ms-3">Nome</label>
                </div>
                <div class="col-md-4 form-floating col mb-3">
                    <input type="date" class="form-control text-warning background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="datanasc" name="datanasc" placeholder="Data de Nascimento" required>
                    <label for="datanasc" class="ms-3">Data de Nascimento</label>
                </div>
                <div class=" col-md-4 form-floating col mb-3">
                    <input type="date" class="form-control text-warning background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="datafale" name="datafale" placeholder="Data de Falecimento">
                    <label for="datafale" class="ms-3">Data de Falecimento</label>
                </div>
                <div class="col-md-4 form-floating col mb-3">
                    <input type="text" class="form-control text-warning background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nacionalidade" name="nacionalidade" placeholder="Nacionalidade" required>
                    <label for="nacionalidade" class="ms-3">Nacionalidade</label>
                </div>
                <div class="col-md-12 form-floating col mb-4">
                    <textarea class="form-control text-warning background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="biografia" name="biografia" placeholder="Biografia" rows="12" style="height: 18em; resize: none;" required></textarea>
                    <label for="biografia" class="ms-3">Biografia</label>
                </div>
                <div class="w-100 text-center text-md-start">
                    <button type="submit" class="btn btn-warning btn-lg text-white text-center px-5">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="w-100">
        <?php require_once '../components/footer.php'; ?>
    </div>
</body>
</html>