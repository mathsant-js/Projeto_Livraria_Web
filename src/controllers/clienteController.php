<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/cliente.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/emailclienteController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/telefoneclienteController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/enderecoclienteController.php';

class ClienteController {
    private $cliente;

    public function __construct() {
        $this->cliente = new Cliente();
        
        if ($_GET['acao'] ?? null) {
            if($_GET['acao'] == 'inserir') {
                $this->inserir();
                echo "<script>javascript:history.go(-2)</script>";
            } else if($_GET['acao'] == 'cadastrar') {
                $this->inserir();
                header('Location: ../views/login.php');
            } else if($_GET['acao'] == 'login') {
                $this->login();
            } else if($_GET['acao'] == 'sair') {
                $this->sair();
                header('Location: ../views/index.php?acao=semacao');
            } else if($_GET['acao'] == 'atualizar') {
                $this->atualizar($_POST['codigo']);
                echo "<script>javascript:history.go(-2)</script>";
            } else if($_GET['acao'] == 'atualizarproprio') {
                $this->atualizar($_GET['codigo']);
                header('Location: ../views/configuracoes.php');
            } else if($_GET['acao'] == 'excluir') {
                $this->excluir($_POST['codigo']);
                echo "<script>javascript:history.go(-2)</script>";
            }
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

    public function login() {
        $this->cliente->login($_POST['email'], $_POST['senha']);
    }

    public function sair() {
        session_start();
        session_destroy();
    }

    public function exibirDescricaoAjax() {
        if (!isset($_POST['cod_cliente']) || empty($_POST['cod_cliente'])) {
            echo json_encode(['error' => 'ID não fornecido']);
            return;
        }
    
        $id = $_POST['cod_cliente'];
        $codigoCliente = $this->cliente->buscarPorId($id);

        $telefoneclientecontroller = new TelefoneClienteController();
        $telefone = $telefoneclientecontroller->buscarPorId($id);

        $enderecoclientecontroller = new EnderecoClienteController();
        $endereco = $enderecoclientecontroller->buscarPorId($id);

        $emailclientecontroller = new EmailClienteController();
        $email = $emailclientecontroller->buscarPorId($id);
        
        if ($codigoCliente) {
            $response = [
                'nome_cliente' => $codigoCliente['nome_cliente'] ?: ['error' => 'Nome nao encontrado'],
                'cpf_cliente' => $codigoCliente['cpf_cliente'] ?: ['error' => 'CPF nao encontrado'],
                'data_nascimento_cliente' => $codigoCliente['data_nascimento_cliente'] ?: ['error' => 'Data de nascimento nao encontrada'],
                'email_cliente' => $email['email_cliente'] ?: ['error' => 'Email nao encontrado'],
                'telefone_cliente' => $telefone['telefone_cliente'] ?: ['error' => 'Telefone não encontrado'],
                'endereco_cliente' => $endereco['endereco_cliente'] ?: ['error' => 'Endereço não encontrado'],
                'senha_cliente' => $codigoCliente['senha_cliente'] ?: ['error' => 'Senha nao encontrada']
            ];
            echo json_encode($response); // Retorna os dados em formato JSON
        } else {
            echo json_encode(['error' => 'Cliente nao encontrado']);
        }
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