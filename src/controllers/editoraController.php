<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/editora.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/telefoneeditoraController.php';

class EditoraController {
    private $editora;

    public function __construct() {
        $this->editora = new Editora();
        
        if($_GET['acao'] == 'inserir') {
            $this->inserir();
            header('Location: ../views/tblEditora.php?acao=semacao');
        } else if($_GET['acao'] == 'atualizar') {
            $this->atualizar($_POST['codigo']);
            header('Location: ../views/tblEditora.php?acao=semacao');
        } else if($_GET['acao'] == 'excluir') {
            $this->excluir($_POST['codigo']);
            header('Location: ../views/tblEditora.php?acao=semacao');
        }
    }

    public function inserir() {
        $this->editora->setNomeEditora($_POST['nome']);
        $this->editora->setEnderecoEditora($_POST['endereco']);

        $codEditora = $this->editora->inserir();

        $telefoneeditoracontroller = new TelefoneEditoraController();
        $telefoneeditoracontroller->inserir($codEditora);
    }

    public function listar(){
        return $this->editora->listar();
    }

    public function buscarPorId($codEditora){
        return $this->editora->buscarPorId($codEditora);
    }

    public function atualizar($codEditora){
        $telefoneeditoracontroller = new TelefoneEditoraController();
        $telefoneeditoracontroller->atualizar($codEditora);

        $this->editora->setCodEditora($codEditora);
        $this->editora->setNomeEditora($_POST['nome']);
        $this->editora->setEnderecoEditora($_POST['endereco']);

        $this->editora->atualizar($codEditora);
    }

    public function excluir($codEditora) {
        $telefoneeditoracontroller = new TelefoneEditoraController();
        $telefoneeditoracontroller->excluir($codEditora);

        $this->editora->excluir($codEditora);
    }
}

new EditoraController();

?>