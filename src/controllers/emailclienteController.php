<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/emailcliente.php';

class EmailClienteController {
    private $emailcliente;

    public function __construct() {
        $this->emailcliente = new EmailCliente();
    }

    public function inserir($codCliente) {
        $this->emailcliente->setCodCliente($codCliente);
        $this->emailcliente->setEmailCliente($_POST['email']);

        $this->emailcliente->inserir();
    }

    public function listar(){
        return $this->emailcliente->listar();
    }

    public function buscarPorId($codCliente){
        return $this->emailcliente->buscarPorId($codCliente);
    }

    public function atualizar($codCliente){
        $this->emailcliente->setCodCliente($codCliente);
        $this->emailcliente->setEmailCliente($_POST['email']);

        $this->emailcliente->atualizar($codCliente);
    }

    public function excluir($codCliente) {
        $this->emailcliente->excluir($codCliente);
    }
}

new EmailClienteController();

?>