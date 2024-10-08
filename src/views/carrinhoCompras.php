<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrinho de Compras</title>
  <link rel="stylesheet" href="../assets/scss/main.css">
  <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body class="background-dark-light">
<?php require_once '../components/header.php' ?>
  <div class="container text-start text-light mt-5">
    <h2 class="lexend-title-semibold text-warning">Carrinho de Compras</h2>
    <div class="row shadow p-3 my-5 my-sm-4 bg-dark rounded">
      <div class="col-md-4">
        <div class="row">
          <div class="col">
            <img src="https://placehold.co/100x150" alt="">
          </div>
          <div class="col-7">
            <ul class="navbar-nav justify-content-start">
              <li class="nav-item">
                <p class="fs-5 lexend-title-semibold text-warning">Nome do Livro</p>
              </li>
              <li class="nav-item">
                <p>Autor: Autor</p>
              </li>
              <li class="nav-item">
                <p>Editora: Editora</p>
              </li>
              <li class="nav-item">
                <p class="fs-5 lexend-title-semibold text-warning">R$ XX,XX</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-8 align-self-end text-end">
        <a href="" class="btn btn-warning btn-lg text-light me-2">Ver Produto</a>
        <a href="" class="btn btn-danger btn-lg">Remover Produto</a>
      </div>
    </div>
    <div class="row shadow p-3 my-5 my-sm-5 bg-dark rounded">
      <div class="col-md-4">
        <div class="row">
          <div class="col">
            <img src="https://placehold.co/100x150" alt="">
          </div>
          <div class="col-7">
            <ul class="navbar-nav justify-content-start">
              <li class="nav-item">
                <p class="fs-5 lexend-title-semibold text-warning">Nome do Livro</p>
              </li>
              <li class="nav-item">
                <p>Autor: Autor</p>
              </li>
              <li class="nav-item">
                <p>Editora: Editora</p>
              </li>
              <li class="nav-item">
                <p class="fs-5 lexend-title-semibold text-warning">R$ XX,XX</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-8 align-self-end text-end">
        <a href="" class="btn btn-warning btn-lg text-light me-2">Ver Produto</a>
        <a href="" class="btn btn-danger btn-lg">Remover Produto</a>
      </div>
    </div>
  </div>
</body>
<?php require_once '../components/footer.php' ?>

</html>