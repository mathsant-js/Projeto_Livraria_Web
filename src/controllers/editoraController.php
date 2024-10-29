<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/editora.php';

class EditoraController {
    private $editora;

    public function __construct() {
        $this->editora = new Editora();
        
        if($_GET['acao'] == 'inserir') {
            $this->inserir();
            header('Location: ../src/views/index.php?acao=semacao');
        } else if($_GET['acao'] == 'atualizar') {
            $this->atualizar($_GET['id']);
            header('Location: ../src/views/index.php?acao=semacao');
        } else if($_GET['acao'] == 'excluir') {
            $this->excluir($_GET['id']);
            header('Location: ../src/views/index.php?acao=semacao');
        }
    }

    public function inserir() {
        $this->editora->setNomeEditora($_POST['nome']);
        $this->editora->setEnderecoEditora($_POST['endereco']);

        $this->editora->inserir();
    }

    public function listar(){
        return $this->editora->listar();
    }

    public function buscarPorId($codEditora){
        return $this->editora->buscarPorId($codEditora);
    }

    public function atualizar($codEditora){
        $this->editora->setCodEditora($codEditora);
        $this->editora->setNomeEditora($_POST['nome']);
        $this->editora->setEnderecoEditora($_POST['endereco']);

        $this->editora->atualizar($codEditora);
    }

    public function excluir($codEditora) {
        $this->editora->excluir($codEditora);
    }
}

new EditoraController();

?>