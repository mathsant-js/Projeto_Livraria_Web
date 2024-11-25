<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/lista.php';

    class ListaController {
        private $lista;
        private $conexao;

        public function __construct()
        {
            $this->lista = new Lista();
            $this->conexao = new Conexao();
    
            if($_GET['acao'] == 'inserir') {
                $this->inserir();
                
            } else if($_GET['acao'] == 'atualizar') {
                $this->atualizar($_POST['codigo']);
                
            } else if($_GET['acao'] == 'excluir') {
                $this->excluir($_POST['codigo']);
                
            } else if($_GET['acao'] == 'excluirlivro') {
                $this->excluirLivro();
                echo "<script> history.back(); location.reload(); </script>";
            }
        }
    
        public function inserir() {
            $this->lista->setDataCriacaoLista(date("Y-m-d"));
            $this->lista->setCodCliente($_POST['codCliente']);
    
            $this->lista->inserir();
        }
    
        public function listar() {
            return $this->lista->listar();
        }
    
        public function buscarPorId($codLista){
            return $this->lista->buscarPorId($codLista);
        }

        public function buscarPorIdDoCliente($codCliente){
            return $this->lista->buscarPorIdDoCliente($codCliente);
        }

        public function listarLivros($codLista) {
            return $this->lista->listarlivros($codLista);
        }

        public function atualizar($codLista) {
            $this->lista->setDataCriacaoLista(date("Y-m-d"));
            $this->lista->setCodCliente($_POST['codCliente']);
    
            $this->lista->atualizar($codLista);
        }

        public function excluir($codLista) {
            $this->lista->excluir($codLista);
        }

        public function inserirLivro($codLista, $codLivro) {
            $this->lista->inserirLivro($codLista, $codLivro);
        }

        public function excluirLivro() {
            $this->lista->excluirLivro($_GET['codLista'], $_GET['codLivro']);
        }
    }
    
    new ListaController();