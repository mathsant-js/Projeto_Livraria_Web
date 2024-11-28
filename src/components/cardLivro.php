<?php
class CardLivro
{
    function carregarCard($nomeEditora, $nomeLivro, $nomeAutor, $precoLivro, $livroId, $editoraId, $autorId)
    {
        echo '
    <!-- Começo do card -->
    <div class="col-sm-3 col-12 mb-sm-3 mb-2">
        <div class="row book-carousel mx-auto mt-3 column-gap-0">
            <div class="col">
                <a href="#">
                    <div class="card book-card bg-dark rounded-4 overflow-hidden">
                        <div class="row border-bottom border-3 border-warning bg-white">
                            <img src="../assets/imgs/static/livroplaceholder.png" alt="book image" class="mx-auto book-card-image">
                            <p class="mb-0">
                                <a href="editorapag.php?acao=semacao&codEditora=' . $editoraId . '" class="link-warning ps-3">' . $nomeEditora . '</a>
                            </p>
                        </div>
                        <div class="row mx-1">
                            <div class="card-body text-white text-center">
                                <h5 class="card-title book-card-title mt-2 text-warning">' . $nomeLivro . '</h5>
                                <p>
                                    <a href="autorpag.php?acao=semacao&codAutor=' . $autorId  . '" class="link-warning">' . $nomeAutor . '</a>
                                </p>
                                <h5 class="card-text">' . $precoLivro . '</h5>
                                <div class="row mt-3">
                                    <div class="col">
                                        <a href="paginaCompra.php?codLivro=' . $livroId . '&acao=semacao" class="btn btn-warning rounded-3 text-white mb-3 w-100">Comprar</a>
                                    </div>
                                    <div class="col col-auto">
                                        <a href="../controllers/listaController.php?acao=adicionarcarrinho&codLivro=' . $livroId . '&codCliente=' . $_SESSION['usuario'] . '" onclick="alert(\'Adicionado ao carrinho!\');">
                                            <img src="../assets/icons/cartAdd.svg" alt="add to cart" height="40px" width="40px">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Fim do Card -->
    ';
    }
}
