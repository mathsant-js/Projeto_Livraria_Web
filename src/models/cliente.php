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
        return $stmt->execute();
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