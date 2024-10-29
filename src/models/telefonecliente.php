<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/connection/conexao.php';

class TelefoneCliente {
    // atributos
    private $codCliente;
    private $telefoneCliente;
    private $conexao;

    // gets e sets
    public function getCodCliente() {
        return $this->codCliente;
    }

    public function setCodCliente($codCliente) {
        $this->codCliente = $codCliente;
    }

    public function getTelefoneCliente() {
        return $this->telefoneCliente;
    }

    public function setTelefoneCliente($telefoneCliente) {
        $this->telefoneCliente = $telefoneCliente;
    }

    // construtor
    public function __construct() {
        $this->conexao = new Conexao();
    }

    // insert
    public function inserir() {
        $sql = "INSERT INTO telefonecliente (`cod_cliente`, `telefone_cliente`) VALUES (?,?);";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ss', $this->codCliente, $this->telefoneCliente);
        return $stmt->execute();
    }

    // listar
    public function listar() {
        $sql = "SELECT * FROM telefonecliente";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $telefonesClientes = [];

        while ($telefoneCliente = $result->fetch_assoc()) {
            $telefonesClientes[] = $telefoneCliente;
        }

        return $telefonesClientes;
    }

    // buscar por id
    public function buscarPorId($codCliente) {
        $sql = "SELECT * FROM telefonecliente WHERE cod_cliente = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // update
    public function atualizar($codCliente) {
        $sql = "UPDATE telefonecliente SET telefone_cliente = ? WHERE cod_cliente = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('si', $this->telefoneCliente, $codCliente);
        return $stmt->execute();
    }

    // delete
    public function excluir($codCliente) {
        $sql = "DELETE FROM telefonecliente WHERE cod_cliente = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codCliente);
        return $stmt->execute();
    }
}

?>