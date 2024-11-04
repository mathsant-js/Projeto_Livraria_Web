<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/telefoneeditora.php';

class TelefoneEditoraController {
    private $telefoneeditora;

    public function __construct() {
        $this->telefoneeditora = new TelefoneEditora();
    }

    public function inserir($codEditora) {
        $this->telefoneeditora->setCodEditora($codEditora);
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