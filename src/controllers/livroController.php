<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/livro.php';

    class LivroController {
        private $livro;
    
        public function __construct()
        {
            $this->livro = new Livro();
    
            if($_GET['acao'] == 'inserir') {
                $this->inserir();
                header('Location: ../views/tblLivro.php?acao=semacao');
            } else if($_GET['acao'] == 'atualizar') {
                $this->atualizar($_POST['codigo']);
                header('Location: ../views/tblLivro.php?acao=semacao');
            } else if($_GET['acao'] == 'excluir') {
                $this->excluir($_POST['codigo']);
                header('Location: ../views/tblLivro.php?acao=semacao');
            }
        }
    
        public function inserir() {
            $this->livro->setNomeLivro($_POST['nome']);
            $this->livro->setIsbnLivro($_POST['isbn']);
            $this->livro->setDataLancamento($_POST['data']);
            $this->livro->setPrecoLivro($_POST['preco']);
            $this->livro->setDescricaoLivro($_POST['descricao']);
    
            $this->livro->inserir();
        }
    
        public function listar() {
            return $this->livro->listar();
        }
    
        public function buscarPorId($codLivro){
            return $this->livro->buscarPorId($codLivro);
        }
    
        public function buscarNomeAutor(){
            return $this->livro->buscarNomeAutor();
        }

        public function buscarNomeGenero(){
            return $this->livro->buscarNomeGenero();
        }

        public function buscarNomeEditora(){
            return $this->livro->buscarNomeEditora();
        }

        public function atualizar($codLivro) {
            $this->livro->setNomeLivro($_POST['nome']);
            $this->livro->setIsbnLivro($_POST['isbn']);
            $this->livro->setDataLancamento($_POST['data']);
            $this->livro->setPrecoLivro($_POST['preco']);
            $this->livro->setDescricaoLivro($_POST['descricao']);
    
            $this->livro->atualizar($codLivro);
        }
    
        public function excluir($codLivro) {
            $this->livro->excluir($codLivro);
        }
    }
    
    new LivroController();