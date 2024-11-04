<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/telefoneeditora.php';

class TelefoneEditoraController {
    private $telefoneeditora;

    public function __construct() {
        $this->telefoneeditora = new TelefoneEditora();
        
        if($_GET['acao'] == 'inserir') {
            $this->inserir();
            header('Location: ../views/index.php?acao=semacao');
        } else if($_GET['acao'] == 'atualizar') {
            $this->atualizar($_POST['codigo']);
            header('Location: ../views/index.php?acao=semacao');
        } else if($_GET['acao'] == 'excluir') {
            $this->excluir($_POST['codigo']);
            header('Location: ../views/index.php?acao=semacao');
        }
    }

    public function inserir() {
        $this->telefoneeditora->setCodEditora($_POST['codigo']);
        $this->telefoneeditora->setTelefoneEditora($_POST['telefone']);

        $this->telefoneeditora->inserir();
    }

    public function listar(){
        return $this->telefoneeditora->listar();
    }

    public function buscarPorId($codEditora){
        return $this->telefoneeditora->buscarPorId($codEditora);
    }

    public function atualizar($codEditora){
        $this->telefoneeditora->setCodEditora($codEditora);
        $this->telefoneeditora->setTelefoneEditora($_POST['telefone']);

        $this->telefoneeditora->atualizar($codEditora);
    }

    public function excluir($codEditora) {
        $this->telefoneeditora->excluir($codEditora);
    }
}

new TelefoneEditoraController();

?>