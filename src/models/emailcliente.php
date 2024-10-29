<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/connection/conexao.php';

class EmailCliente {
    // atributos
    private $codCliente;
    private $emailCliente;
    private $conexao;

    // gets e sets
    public function getCodCliente() {
        return $this->codCliente;
    }

    public function setCodCliente($codCliente) {
        $this->codCliente = $codCliente;
    }

    public function getEmailCliente() {
        return $this->emailCliente;
    }

    public function setEmailCliente($emailCliente) {
        $this->emailCliente = $emailCliente;
    }

    // construtor
    public function __construct() {
        $this->conexao = new Conexao();
    }

    // insert
    public function inserir() {
        $sql = "INSERT INTO emailcliente (`cod_cliente`, `email_cliente`) VALUES (?,?);";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ss', $this->codCliente, $this->emailCliente);
        return $stmt->execute();
    }

    // listar
    public function listar() {
        $sql = "SELECT * FROM emailcliente";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $emailsClientes = [];

        while ($emailCliente = $result->fetch_assoc()) {
            $emailsClientes[] = $emailCliente;
        }

        return $emailsClientes;
    }

    // buscar por id
    public function buscarPorId($codCliente) {
        $sql = "SELECT * FROM emailcliente WHERE cod_cliente = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // update
    public function atualizar($codCliente) {
        $sql = "UPDATE emailcliente SET email_cliente = ? WHERE cod_cliente = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('si', $this->emailCliente, $codCliente);
        return $stmt->execute();
    }

    // delete
    public function excluir($codCliente) {
        $sql = "DELETE FROM emailcliente WHERE cod_cliente = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codCliente);
        return $stmt->execute();
    }
}

?>