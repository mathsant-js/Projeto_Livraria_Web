<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/livro.php';

    class LivroController {
        private $livro;
        private $conexao;

        public function __construct()
        {
            $this->livro = new Livro();
            $this->conexao = new Conexao();
    
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
            $this->livro->setCodGenero($_POST['genero']);
            $this->livro->setCodEditora($_POST['editora']);
    
            $this->livro->inserir();
    
            $codLivro = $this->livro->buscarPorID($_POST['codigo']);

            if (isset($_POST['autor'])) {
                foreach ($_POST['autor'] as $codAutor) {
                    $this->inserirAutorLivro($codLivro, $codAutor);
                }
            }
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

        public function buscarLivro() {
            return $this->livro->buscarLivro();
        }

        public function atualizar($codLivro) {
            $this->livro->setNomeLivro($_POST['nome']);
            $this->livro->setIsbnLivro($_POST['isbn']);
            $this->livro->setDataLancamento($_POST['data']);
            $this->livro->setPrecoLivro($_POST['preco']);
            $this->livro->setDescricaoLivro($_POST['descricao']);
            $this->livro->setCodGenero($_POST['genero']);
            $this->livro->setCodEditora($_POST['editora']);
    
            $this->livro->atualizar($codLivro);
            $this->atualizarAutoresLivro($codLivro, $_POST['autor']);
        }
        
        private function atualizarAutoresLivro($codLivro, $autores) {
            // Remover autores antigos
            $sqlDelete = "DELETE FROM autorlivro WHERE cod_livro = ?";
            $stmtDelete = $this->conexao->getConexao()->prepare($sqlDelete);
            $stmtDelete->bind_param('i', $codLivro);
            $stmtDelete->execute();
        
            // Inserir novos autores
            foreach ($autores as $codAutor) {
                $this->inserirAutorLivro($codLivro, $codAutor);
            }
        }

        public function buscarAutoresPorLivro($codLivro) {
            return $this->livro->buscarAutoresPorLivro($codLivro);
        }

        public function excluir($codLivro) {
            $this->livro->excluir($codLivro);
        }

        private function inserirAutorLivro($codLivro, $codAutor) {
            $sql = "INSERT INTO autorlivro (cod_livro, cod_autor) VALUES (?, ?)";
            $stmt = $this->conexao->getConexao()->prepare($sql);
            $stmt->bind_param('ii', $codLivro, $codAutor);
            $stmt->execute();
        }
    }
    
    new LivroController();