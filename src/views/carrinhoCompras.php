<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/listaController.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/livroController.php';

    function imagefind($imgId) {
      $caminho = "../assets/imgs/static/bookcovers/";
      if (file_exists( $caminho . $imgId . ".png")) {
          return $caminho . $imgId . ".png";
      }
      else {
          return $caminho . "livroplaceholder.png";
      }
  }
?>

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
  <div class="container text-start text-light mt-5 mb-5 pb-5">
    <h5><a href="javascript:history.back()" class="link-warning">< Voltar</a></h5>
    <h2 class="text-warning ms-md-3 mb-4">Carrinho de Compras</h2>

<!-- aqui -->
    <?php 
        $listaController = new ListaController();
        $livroController = new LivroController();
        $lista = $listaController->buscarPorIdDoCliente(@$_SESSION["usuario"]);
        @$livroslista = $listaController->listarLivros($lista['cod_lista']);
        
        if (count($livroslista) === 0) {
          ?> <h4 class="text-white ms-md-3 mb-4">Não há livros salvos no carrinho.</h4> <?php
        } else {
          foreach($livroslista as $livrolista) {
          $livro = $livroController->buscarLivroParaCompra($livrolista['cod_livro']);
    ?>
    <div class="row shadow p-3 my-5 my-sm-4 bg-dark rounded-2 mb-3 row-cols-md-1 row-cols-1">
          <div class="col">
            <div class="row">
              <div class="col-12 col-lg-4 col-md-6">
                <div class="cart-image bg-white rounded-4 text-center">
                  <img src="<?php echo imagefind($livro['livro_id']); ?>" alt="bookimage" height="225px" class="mx-auto text-warning rounded-4">
                </div>
              </div>
              <div class="col-7 col-md-4">
                <ul class="navbar-nav justify-content-start">
                  <li class="nav-item">
                    <p class="fs-2 lexend-title-semibold text-warning text-break"><?php echo $livro['nome_livro']; ?></p>
                  </li>
                  <li class="nav-item">
                    <p class="text-break">Autor: <?php echo $livro['autor']; ?></p>
                  </li>
                  <li class="nav-item">
                    <p class="text-break">Editora: <?php echo $livro['editora']; ?></p>
                  </li>
                  <li class="nav-item">
                    <p class="fs-5 lexend-title-semibold text-warning text-break">R$ <?php echo $livro['preco_livro']; ?></p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 align-self-auto align-self-md-end text-start text-md-end">
            <a href="paginaCompra.php?acao=semacao&codLivro=<?php echo $livro['livro_id']; ?>" class="btn btn-warning btn-lg text-light me-2 mb-3 mb-md-0">Ver Produto</a>
            <a href="../controllers/listaController.php?acao=excluirlivro&codLista=1&codLivro=<?php echo $livro['livro_id']; ?>" class="btn btn-danger btn-lg me-2 mb-3 mb-md-0">Remover Produto</a>
          </div>
    </div>
    <?php } } ?>
  </div>
</body>
<?php require_once '../components/footer.php' ?>

</html>