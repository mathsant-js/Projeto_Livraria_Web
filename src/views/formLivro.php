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
            <form class="row row-cols-1 row-cols-md-2 text-start mx-md-3">
                <h2 class="text-warning ms-md-3 mb-4 w-100">Dados do Livro</h2>
                
                <div class="col-md-2 form-floating col mb-3">
                    <input type="number" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="codlivro" name="codlivro" placeholder="Código do Livro" required>
                    <label for="codlivro" class="text-warning ms-3">Código do Livro</label>
                </div>
                <div class="col-md-10 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nomelivro" name="nomelivro" placeholder="Nome do Livro" required>
                    <label for="nomelivro" class="text-warning ms-3">Nome do Livro</label>
                </div>
                <div class="col-md-4 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="isbn" name="isbn" placeholder="ISBN" required>
                    <label for="isbn" class="text-warning ms-3">ISBN</label>
                </div>
                <div class=" col-md-4 form-floating col mb-3">
                    <input type="date" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="datalanc" name="datalanc" placeholder="Data de Lançamento" required>
                    <label for="datalanc" class="text-warning ms-3">Data de Lançamento</label>
                </div>
                <div class="col-md-4 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="preco" name="preco" placeholder="Preço" required>
                    <label for="preco" class="text-warning ms-3">Preço</label>
                </div>
                <div class="col-md-2 form-floating col mb-3">
                    <input type="number" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="codautor" name="codautor" placeholder="Código do Autor" required>
                    <label for="codautor" class="text-warning ms-3">Código do Autor</label>
                </div>
                <div class="col-md-10 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nomeautor" name="nomeautor" placeholder="Nome do Autor" required>
                    <label for="nomeautor" class="text-warning ms-3">Nome do Autor</label>
                </div>
                <div class="col-md-2 form-floating col mb-3">
                    <input type="number" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="codeditora" name="codeditora" placeholder="Código da Editora" required>
                    <label for="codeditora" class="text-warning ms-3">Código da Editora</label>
                </div>
                <div class="col-md-10 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nomeeditora" name="nomeeditora" placeholder="Nome da Editora" required>
                    <label for="nomeeditora" class="text-warning ms-3">Nome da Editora</label>
                </div>
                <div class="col-md-2 form-floating col mb-3">
                    <input type="number" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="codgenero" name="codgenero" placeholder="Código do Gênero" required>
                    <label for="codgenero" class="text-warning ms-3">Código do Gênero</label>
                </div>
                <div class="col-md-10 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nomegenero" name="nomegenero" placeholder="Nome do Gênero" required>
                    <label for="nomegenero" class="text-warning ms-3">Nome do Gênero</label>
                </div>
                <div class="col-md-12 form-floating col mb-4">
                    <textarea class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="descricao" name="descricao" placeholder="Descrição" rows="12" style="height: 18em; resize: none;" required></textarea>
                    <label for="descricao" class="text-warning ms-3">Descrição</label>
                </div>
                <div class="w-100 text-center text-md-start">
                    <button type="submit" class="btn btn-warning btn-lg text-white text-center px-5">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="w-100 mt-1 pt-4">
        <?php require_once '../components/footer.php'; ?>
    </div>
</body>
</html>