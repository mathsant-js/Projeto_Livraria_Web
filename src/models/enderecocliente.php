<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/connection/conexao.php';

class EnderecoCliente {
    // atributos
    private $codCliente;
    private $enderecoCliente;
    private $conexao;

    // gets e sets
    public function getCodCliente() {
        return $this->codCliente;
    }

    public function setCodCliente($codCliente) {
        $this->codCliente = $codCliente;
    }

    public function getEnderecoCliente() {
        return $this->enderecoCliente;
    }

    public function setEnderecoCliente($enderecoCliente) {
        $this->enderecoCliente = $enderecoCliente;
    }

    // construtor
    public function __construct() {
        $this->conexao = new Conexao();
    }

    // insert
    public function inserir() {
        $sql = "INSERT INTO enderecocliente (`cod_cliente`, `endereco_cliente`) VALUES (?,?);";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ss', $this->codCliente, $this->enderecoCliente);
        return $stmt->execute();
    }

    // listar
    public function listar() {
        $sql = "SELECT * FROM enderecocliente";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $enderecosClientes = [];

        while ($enderecoCliente = $result->fetch_assoc()) {
            $enderecosClientes[] = $enderecoCliente;
        }

        return $enderecosClientes;
    }

    // buscar por id
    public function buscarPorId($codCliente) {
        $sql = "SELECT * FROM enderecocliente WHERE cod_cliente = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // update
    public function atualizar($codCliente) {
        $sql = "UPDATE enderecocliente SET endereco_cliente = ? WHERE cod_cliente = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('si', $this->enderecoCliente, $codCliente);
        return $stmt->execute();
    }

    // delete
    public function excluir($codCliente) {
        $sql = "DELETE FROM enderecocliente WHERE cod_cliente = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codCliente);
        return $stmt->execute();
    }
}

?>