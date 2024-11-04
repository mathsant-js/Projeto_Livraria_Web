<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/cliente.php';

class ClienteController {
    private $cliente;

    public function __construct() {
        $this->cliente = new Cliente();
        
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
        $this->cliente->setNomeCliente($_POST['nome']);
        $this->cliente->setCpfCliente($_POST['cpf']);
        $this->cliente->setDatanascCliente($_POST['datanasc']);
        $this->cliente->setSenhaCliente($_POST['senha']);

        $this->cliente->inserir();
    }

    public function listar(){
        return $this->cliente->listar();
    }

    public function buscarPorId($codCliente){
        return $this->cliente->buscarPorId($codCliente);
    }

    public function atualizar($codCliente){
        $this->cliente->setCodCliente($codCliente);
        $this->cliente->setNomeCliente($_POST['nome']);
        $this->cliente->setCpfCliente($_POST['cpf']);
        $this->cliente->setDatanascCliente($_POST['datanasc']);
        $this->cliente->setSenhaCliente($_POST['senha']);

        $this->cliente->atualizar($codCliente);
    }

    public function excluir($codCliente) {
        $this->cliente->excluir($codCliente);
    }
}

new ClienteController();

?>