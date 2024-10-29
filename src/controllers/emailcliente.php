<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/emailcliente.php';

class EmailClienteController {
    private $emailcliente;

    public function __construct() {
        $this->emailcliente = new EmailCliente();
        
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
        $this->emailcliente->setCodCliente($_POST['codigo']);
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