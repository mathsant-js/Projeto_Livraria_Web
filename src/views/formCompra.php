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
                <h2 class="text-warning ms-md-3 mb-4 w-100">Dados da compra</h2>
                
                <div class="col-md-2 form-floating col mb-3">
                    <input type="number" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="codigo" name="codigo" placeholder="Código" required>
                    <label for="codigo" class="text-warning ms-3">Código do cliente</label>
                </div>
                <div class="col-md-10 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nomecliente" name="nomecliente" placeholder="Nome do cliente" required>
                    <label for="nomecliente" class="text-warning ms-3">Nome do cliente</label>
                </div>
                <div class="form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="metodopag" name="metodopag" placeholder="Método de Pagamento" required>
                    <label for="metodopag" class="text-warning ms-3">Método de Pagamento</label>
                </div>
                <div class="form-floating col mb-4">
                    <input type="date" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="prazo" name="prazo" placeholder="Prazo de Entrega" required>
                    <label for="prazo" class="text-warning ms-3">Prazo de Entrega</label>
                </div>
                <div class="col-md-12 mb-3">
                    <table class="table table-bordered text-break table-sm">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Código do Produto</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Preço</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>23</td>
                                <td>Livrooooooooooooooooooooo</td>
                                <td>R$30,00</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>40</td>
                                <td>Livro</td>
                                <td>R$50,00</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>15</td>
                                <td>Livro</td>
                                <td>R$25,00</td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="3" class="text-end pe-3">Total</th>
                                <td>R$105,00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-100 text-center text-md-start">
                    <button type="submit" class="btn btn-warning btn-lg text-white text-center px-5">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="w-100 mt-1 pt-5">
        <?php require_once '../components/footer.php'; ?>
    </div>
</body>
</html>