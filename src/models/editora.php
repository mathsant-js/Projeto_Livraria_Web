<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/connection/conexao.php';

class Editora {
    // atributos
    private $codEditora;
    private $nomeEditora;
    private $enderecoEditora;
    private $conexao;

    // gets e sets
    public function getCodEditora() {
        return $this->codEditora;
    }

    public function setCodEditora($codEditora) {
        $this->codEditora = $codEditora;
    }

    public function getNomeEditora() {
        return $this->nomeEditora;
    }

    public function setNomeEditora($nomeEditora) {
        $this->nomeEditora = $nomeEditora;
    }

    public function getEnderecoEditora() {
        return $this->enderecoEditora;
    }

    public function setEnderecoEditora($enderecoEditora) {
        $this->enderecoEditora = $enderecoEditora;
    }

    // construtor
    public function __construct() {
        $this->conexao = new Conexao();
    }

    // insert
    public function inserir() {
        $sql = "INSERT INTO editora (`nome_editora`, `endereco_editora`) VALUES (?,?);";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ss', $this->nomeEditora, $this->enderecoEditora);
        return $stmt->execute();
    }

    // listar
    public function listar() {
        $sql = "SELECT * FROM editora";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $editoras = [];

        while ($editora = $result->fetch_assoc()) {
            $editoras[] = $editora;
        }

        return $editoras;
    }

    // buscar por id
    public function buscarPorId($codEditora) {
        $sql = "SELECT * FROM editora WHERE cod_editora = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codEditora);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // update
    public function atualizar($codEditora) {
        $sql = "UPDATE editora SET nome_editora = ?, endereco_editora = ? WHERE cod_editora = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ssi', $this->nomeEditora, $this->enderecoEditora, $codEditora);
        return $stmt->execute();
    }

    // delete
    public function excluir($codEditora) {
        $sql = "DELETE FROM editora WHERE cod_editora = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codEditora);
        return $stmt->execute();
    }
}

?>