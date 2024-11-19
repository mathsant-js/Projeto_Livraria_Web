<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/cliente.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/emailclienteController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/telefoneclienteController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/enderecoclienteController.php';

class ClienteController {
    private $cliente;

    public function __construct() {
        $this->cliente = new Cliente();
        
        if($_GET['acao'] == 'inserir') {
            $this->inserir();
            header('Location: ../views/tblCliente.php?acao=semacao');
        } else if($_GET['acao'] == 'atualizar') {
            $this->atualizar($_POST['codigo']);
            header('Location: ../views/tblCliente.php?acao=semacao');
        } else if($_GET['acao'] == 'excluir') {
            $this->excluir($_POST['codigo']);
            header('Location: ../views/tblCliente.php?acao=semacao');
        }
    }

    public function inserir() {
        $this->cliente->setNomeCliente($_POST['nome']);
        $this->cliente->setCpfCliente($_POST['cpf']);
        $this->cliente->setDatanascCliente($_POST['datanasc']);
        $this->cliente->setSenhaCliente($_POST['senha']);

        $codCliente = $this->cliente->inserir();

        $emailclientecontroller = new EmailClienteController();
        $emailclientecontroller->inserir($codCliente);

        $telefoneclientecontroller = new TelefoneClienteController();
        $telefoneclientecontroller->inserir($codCliente);

        $enderecoclientecontroller = new EnderecoClienteController();
        $enderecoclientecontroller->inserir($codCliente);
    }

    public function listar(){
        return $this->cliente->listar();
    }

    public function buscarPorId($codCliente){
        return $this->cliente->buscarPorId($codCliente);
    }

    public function atualizar($codCliente){
        $emailclientecontroller = new EmailClienteController();
        $emailclientecontroller->atualizar($codCliente);

        $telefoneclientecontroller = new TelefoneClienteController();
        $telefoneclientecontroller->atualizar($codCliente);

        $enderecoclientecontroller = new EnderecoClienteController();
        $enderecoclientecontroller->atualizar($codCliente);

        $this->cliente->setCodCliente($codCliente);
        $this->cliente->setNomeCliente($_POST['nome']);
        $this->cliente->setCpfCliente($_POST['cpf']);
        $this->cliente->setDatanascCliente($_POST['datanasc']);
        $this->cliente->setSenhaCliente($_POST['senha']);

        $this->cliente->atualizar($codCliente);
    }

    public function excluir($codCliente) {
        $emailclientecontroller = new EmailClienteController();
        $emailclientecontroller->excluir($codCliente);

        $telefoneclientecontroller = new TelefoneClienteController();
        $telefoneclientecontroller->excluir($codCliente);

        $enderecoclientecontroller = new EnderecoClienteController();
        $enderecoclientecontroller->excluir($codCliente);

        $this->cliente->excluir($codCliente);
    }
}

new ClienteController();

?>