<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/connection/conexao.php';

class Cliente {
    // atributos
    private $codCliente;
    private $nomeCliente;
    private $cpfCliente;
    private $datanascCliente;
    private $senhaCliente;
    private $conexao;

    // gets e sets
    public function getCodCliente() {
        return $this->codCliente;
    }

    public function setCodCliente($codCliente) {
        $this->codCliente = $codCliente;
    }

    public function getNomeCliente() {
        return $this->nomeCliente;
    }

    public function setNomeCliente($nomeCliente) {
        $this->nomeCliente = $nomeCliente;
    }

    public function getCpfCliente() {
        return $this->cpfCliente;
    }

    public function setCpfCliente($cpfCliente) {
        $this->cpfCliente = $cpfCliente;
    }

    public function getDatanascCliente() {
        return $this->datanascCliente;
    }

    public function setDatanascCliente($datanascCliente) {
        $this->datanascCliente = $datanascCliente;
    }

    public function getSenhaCliente() {
        return $this->senhaCliente;
    }

    public function setSenhaCliente($senhaCliente) {
        $this->senhaCliente = $senhaCliente;
    }

    // construtor
    public function __construct() {
        $this->conexao = new Conexao();
    }

    // insert
    public function inserir() {
        $sql = "INSERT INTO cliente (`nome_cliente`, `cpf_cliente`, `data_nascimento_cliente`, `senha_cliente`) VALUES (?,?,?,?);";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ssss', $this->nomeCliente, $this->cpfCliente, $this->datanascCliente, $this->senhaCliente);
        $stmt->execute();
        return $stmt->insert_id;
    }

    // listar
    public function listar() {
        $sql = "SELECT * FROM cliente";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $clientes = [];

        while ($cliente = $result->fetch_assoc()) {
            $clientes[] = $cliente;
        }

        return $clientes;
    }

    // login
    public function login($email, $senha) {
        session_start();

        $sql = "SELECT c.cod_cliente AS cliente_id,
                c.senha_cliente,
                e.email_cliente
                FROM cliente c
                LEFT JOIN emailcliente as e
    			ON c.cod_cliente = e.cod_cliente
                WHERE c.senha_cliente = ? && e.email_cliente = ?;";

        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ss', $senha, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $cliente = $result->fetch_assoc();
        
        if (is_null($cliente)) {
            echo "<script type='text/javascript'>history.back();</script>";
            echo "<script type='text/javascript'>alert('Não foi possível realizar o login. Verifique as informações preenchidas e tente novamente.');</script>";
        } else {
            $_SESSION["usuario"] = $cliente['cliente_id'];
            echo "<script type='text/javascript'>alert('Login Realizado com sucesso!');</script>";
            header('Location: ../views/index.php?acao=semacao');
        }
    }

    // buscar por id
    public function buscarPorId($codCliente) {
        $sql = "SELECT * FROM cliente WHERE cod_cliente = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // update
    public function atualizar($codCliente) {
        $sql = "UPDATE cliente SET nome_cliente = ?, cpf_cliente = ?, data_nascimento_cliente = ?, senha_cliente = ? WHERE cod_cliente = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ssssi', $this->nomeCliente, $this->cpfCliente, $this->datanascCliente, $this->senhaCliente, $codCliente);
        return $stmt->execute();
    }

    // delete
    public function excluir($codCliente) {
        $sql = "DELETE FROM cliente WHERE cod_cliente = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codCliente);
        return $stmt->execute();
    }
}

?>