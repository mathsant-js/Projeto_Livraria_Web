<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/telefonecliente.php';

class TelefoneClienteController {
    private $telefonecliente;

    public function __construct() {
        $this->telefonecliente = new TelefoneCliente();
    }

    public function inserir($codCliente) {
        $this->telefonecliente->setCodCliente($codCliente);
        $this->telefonecliente->setTelefoneCliente($_POST['telefone']);

        $this->telefonecliente->inserir();
    }

    public function listar(){
        return $this->telefonecliente->listar();
    }

    public function buscarPorId($codCliente){
        return $this->telefonecliente->buscarPorId($codCliente);
    }

    public function atualizar($codCliente){
        $this->telefonecliente->setCodCliente($codCliente);
        $this->telefonecliente->setTelefoneCliente($_POST['telefone']);

        $this->telefonecliente->atualizar($codCliente);
    }

    public function excluir($codCliente) {
        $this->telefonecliente->excluir($codCliente);
    }
}

new TelefoneClienteController();

?>