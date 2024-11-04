<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/enderecocliente.php';

class EnderecoClienteController {
    private $enderecocliente;

    public function __construct() {
        $this->enderecocliente = new EnderecoCliente();
        
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
        $this->enderecocliente->setCodCliente($_POST['codigo']);
        $this->enderecocliente->setEnderecoCliente($_POST['endereco']);

        $this->enderecocliente->inserir();
    }

    public function listar(){
        return $this->enderecocliente->listar();
    }

    public function buscarPorId($codCliente){
        return $this->enderecocliente->buscarPorId($codCliente);
    }

    public function atualizar($codCliente){
        $this->enderecocliente->setCodCliente($codCliente);
        $this->enderecocliente->setEnderecoCliente($_POST['endereco']);

        $this->enderecocliente->atualizar($codCliente);
    }

    public function excluir($codCliente) {
        $this->enderecocliente->excluir($codCliente);
    }
}

new EnderecoClienteController();

?>