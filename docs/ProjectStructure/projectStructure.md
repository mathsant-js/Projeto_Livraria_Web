📦Projeto_Livraria_Web
 ┣ 📂docs
 ┃ ┣ 📂imgs
 ┃ ┃ ┗ 📜xamppControlPanelpng.png       -> Imagem presente no README.md
 ┃ ┣ 📂ProjectStructure                 ## Pasta que contém a estrutura do projeto
 ┃ ┗ 📜projectStructure.md              -> Arquivo com a estrutura do projeto
 ┣ 📂src
 ┃ ┣ 📂assets
 ┃ ┃ ┣ 📂icons                          ## Ícones do projeto
 ┃ ┃ ┃ ┣ 📂formasPagamento              ## Ícones de formas de pagamento
 ┃ ┃ ┃ ┃ ┣ 📜metodoApplePay.svg
 ┃ ┃ ┃ ┃ ┣ 📜metodoDinnersClube.svg
 ┃ ┃ ┃ ┃ ┣ 📜metodoGooglePay.svg
 ┃ ┃ ┃ ┃ ┣ 📜metodoMasterCard.svg
 ┃ ┃ ┃ ┃ ┣ 📜metodoPayPal.svg
 ┃ ┃ ┃ ┃ ┗ 📜metodoVisa.svg
 ┃ ┃ ┃ ┣ 📜camera.svg
 ┃ ┃ ┃ ┣ 📜cartAdd.svg
 ┃ ┃ ┃ ┣ 📜cartBuy.svg
 ┃ ┃ ┃ ┣ 📜dropdownicon.svg
 ┃ ┃ ┃ ┣ 📜logo.svg
 ┃ ┃ ┃ ┣ 📜personCircle.svg
 ┃ ┃ ┃ ┣ 📜placeIcon.svg
 ┃ ┃ ┃ ┗ 📜search.svg
 ┃ ┃ ┣ 📂imgs
 ┃ ┃ ┃ ┣ 📂dynamic
 ┃ ┃ ┃ ┃ ┗ 📜imagemParaPastarSubir.svg
 ┃ ┃ ┃ ┗ 📂static
 ┃ ┃ ┃ ┃ ┣ 📂bookcovers                ## Pasta com as imagens dos livros
 ┃ ┃ ┃ ┃ ┃ ┣ 📜1.png
 ┃ ┃ ┃ ┃ ┃ ┣ 📜2.png
 ┃ ┃ ┃ ┃ ┃ ┣ 📜3.png
 ┃ ┃ ┃ ┃ ┃ ┣ 📜4.png
 ┃ ┃ ┃ ┃ ┃ ┣ 📜5.png
 ┃ ┃ ┃ ┃ ┃ ┣ 📜6.png
 ┃ ┃ ┃ ┃ ┃ ┣ 📜7.png
 ┃ ┃ ┃ ┃ ┃ ┣ 📜8.png
 ┃ ┃ ┃ ┃ ┃ ┗ 📜livroplaceholder.png
 ┃ ┃ ┃ ┃ ┣ 📜2.png
 ┃ ┃ ┃ ┃ ┣ 📜3.png
 ┃ ┃ ┃ ┃ ┣ 📜autorplaceholder.png
 ┃ ┃ ┃ ┃ ┣ 📜bg-autor.jpg
 ┃ ┃ ┃ ┃ ┣ 📜bwbookbg.jpg
 ┃ ┃ ┃ ┃ ┣ 📜imagemParaPastarSubir.svg
 ┃ ┃ ┃ ┃ ┣ 📜imgCarousel1.svg
 ┃ ┃ ┃ ┃ ┣ 📜imgCarouselWithFade.svg
 ┃ ┃ ┃ ┃ ┣ 📜livroplaceholder.png
 ┃ ┃ ┃ ┃ ┣ 📜loginbackground.png
 ┃ ┃ ┃ ┃ ┣ 📜logo.svg
 ┃ ┃ ┃ ┃ ┗ 📜placeholderlogo.jpg
 ┃ ┃ ┗ 📂scss                       ## Pasta com estilização do projeto
 ┃ ┃ ┃ ┣ 📜main.css
 ┃ ┃ ┃ ┣ 📜main.css.map
 ┃ ┃ ┃ ┣ 📜main.scss
 ┃ ┃ ┃ ┗ 📜mensagemErro.css
 ┃ ┣ 📂components                   ## Componentes dinâmicos do projeto
 ┃ ┃ ┣ 📜cardLivro.php
 ┃ ┃ ┣ 📜footer.php
 ┃ ┃ ┗ 📜header.php
 ┃ ┣ 📂connection                   ## Pasta com arquivo de conexão com o banco de dados
 ┃ ┃ ┗ 📜conexao.php
 ┃ ┣ 📂controllers
 ┃ ┃ ┣ 📂ajaxHandlers               ## Pasta com o controlador da requisição AJAX
 ┃ ┃ ┃ ┣ 📜ajaxHandler.php
 ┃ ┃ ┃ ┣ 📜ajaxHandlerAutor.php
 ┃ ┃ ┃ ┣ 📜ajaxHandlerCliente.php
 ┃ ┃ ┃ ┗ 📜ajaxHandlerLivro.php
 ┃ ┃ ┣ 📜autorController.php
 ┃ ┃ ┣ 📜clienteController.php
 ┃ ┃ ┣ 📜editoraController.php
 ┃ ┃ ┣ 📜emailclienteController.php
 ┃ ┃ ┣ 📜enderecoclienteController.php
 ┃ ┃ ┣ 📜generoController.php
 ┃ ┃ ┣ 📜homepageController.php
 ┃ ┃ ┣ 📜listaController.php
 ┃ ┃ ┣ 📜livroController.php
 ┃ ┃ ┣ 📜telefoneclienteController.php
 ┃ ┃ ┗ 📜telefoneeditoraController.php
 ┃ ┣ 📂js
 ┃ ┃ ┣ 📂bootstrap                 ## Pasta com o arquivo JS do Bootstrap           
 ┃ ┃ ┃ ┗ 📜bootstrap.bundle.min.js
 ┃ ┃ ┣ 📂modalRequisicaoAjax       ## Pasta com arquivos que chamam os modals e puxam os dados 
 ┃ ┃ ┃ ┣ 📜modalTbl.js
 ┃ ┃ ┃ ┣ 📜modalTblAutor.js
 ┃ ┃ ┃ ┣ 📜modalTblCliente.js
 ┃ ┃ ┃ ┗ 📜modalTblLivro.js
 ┃ ┃ ┗ 📂validacaoJS                ## Pasta com arquivos de validação de formulários
 ┃ ┃ ┃ ┣ 📜validacaoAutor.js
 ┃ ┃ ┃ ┣ 📜validacaoCadastro.js
 ┃ ┃ ┃ ┣ 📜validacaoCartao.js
 ┃ ┃ ┃ ┣ 📜validacaoCliente.js
 ┃ ┃ ┃ ┣ 📜validacaoEditora.js
 ┃ ┃ ┃ ┗ 📜validacaoLivro.js
 ┃ ┣ 📂models
 ┃ ┃ ┣ 📜autor.php
 ┃ ┃ ┣ 📜cliente.php
 ┃ ┃ ┣ 📜editora.php
 ┃ ┃ ┣ 📜emailcliente.php
 ┃ ┃ ┣ 📜enderecocliente.php
 ┃ ┃ ┣ 📜genero.php
 ┃ ┃ ┣ 📜lista.php
 ┃ ┃ ┣ 📜livro.php
 ┃ ┃ ┣ 📜telefonecliente.php
 ┃ ┃ ┗ 📜telefoneeditora.php
 ┃ ┣ 📂views
 ┃ ┃ ┣ 📜autorpag.php
 ┃ ┃ ┣ 📜cadastro.php
 ┃ ┃ ┣ 📜carrinhoCompras.php
 ┃ ┃ ┣ 📜configuracoes.php
 ┃ ┃ ┣ 📜dadosUsuario.php
 ┃ ┃ ┣ 📜editorapag.php
 ┃ ┃ ┣ 📜formaPagamento.php
 ┃ ┃ ┣ 📜formAutorCrt.php
 ┃ ┃ ┣ 📜formAutorUpdDlt.php
 ┃ ┃ ┣ 📜formClienteCrt.php
 ┃ ┃ ┣ 📜formClienteUpdDlt.php
 ┃ ┃ ┣ 📜formCompra.php
 ┃ ┃ ┣ 📜formEditoraCrt.php
 ┃ ┃ ┣ 📜formEditoraUpdDlt.php
 ┃ ┃ ┣ 📜formGeneroCrt.php
 ┃ ┃ ┣ 📜formGeneroUpdDlt.php
 ┃ ┃ ┣ 📜formLivroCrt.php
 ┃ ┃ ┣ 📜formLivroUpdDlt.php
 ┃ ┃ ┣ 📜index.php
 ┃ ┃ ┣ 📜livrosCompra.php
 ┃ ┃ ┣ 📜login.php
 ┃ ┃ ┣ 📜paginaCompra.php
 ┃ ┃ ┣ 📜sucessoPagamento.php
 ┃ ┃ ┣ 📜tblAutor.php
 ┃ ┃ ┣ 📜tblCliente.php
 ┃ ┃ ┣ 📜tblEditora.php
 ┃ ┃ ┣ 📜tblGenero.php
 ┃ ┃ ┣ 📜tblLivro.php
 ┃ ┃ ┗ 📜verAutores.php
 ┃ ┗ 📜db_livraria.sql
 ┣ 📜.gitignore
 ┣ 📜package-lock.json
 ┣ 📜package.json
 ┗ 📜README.md