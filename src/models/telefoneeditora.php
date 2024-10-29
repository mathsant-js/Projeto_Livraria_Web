<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/connection/conexao.php';

class TelefoneEditora {
    // atributos
    private $codEditora;
    private $telefoneEditora;
    private $conexao;

    // gets e sets
    public function getCodEditora() {
        return $this->codEditora;
    }

    public function setCodEditora($codEditora) {
        $this->codEditora = $codEditora;
    }

    public function getTelefoneEditora() {
        return $this->telefoneEditora;
    }

    public function setTelefoneEditora($telefoneEditora) {
        $this->telefoneEditora = $telefoneEditora;
    }

    // construtor
    public function __construct() {
        $this->conexao = new Conexao();
    }

    // insert
    public function inserir() {
        $sql = "INSERT INTO telefoneeditora (`cod_editora`, `telefone_editora`) VALUES (?,?);";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ss', $this->codEditora, $this->telefoneEditora);
        return $stmt->execute();
    }

    // listar
    public function listar() {
        $sql = "SELECT * FROM telefoneeditora";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $telefoneseditoras = [];

        while ($telefoneeditora = $result->fetch_assoc()) {
            $telefoneseditoras[] = $telefoneeditora;
        }

        return $telefoneseditoras;
    }

    // buscar por id
    public function buscarPorId($codEditora) {
        $sql = "SELECT * FROM telefoneeditora WHERE cod_editora = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codEditora);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // update
    public function atualizar($codEditora) {
        $sql = "UPDATE telefoneeditora SET telefone_editora = ? WHERE cod_editora = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('si', $this->telefoneEditora, $codEditora);
        return $stmt->execute();
    }

    // delete
    public function excluir($codEditora) {
        $sql = "DELETE FROM telefoneeditora WHERE cod_editora = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codEditora);
        return $stmt->execute();
    }
}

?>