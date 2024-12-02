<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/connection/conexao.php';

class Autor {
    // atributos
    private $codAutor;
    private $nomeAutor;
    private $biografiaAutor;
    private $datanascAutor;
    private $datafaleAutor;
    private $nacionalidadeAutor;
    private $conexao;

    // gets e sets
    public function getCodAutor() {
        return $this->codAutor;
    }

    public function setCodAutor($codAutor) {
        $this->codAutor = $codAutor;
    }

    public function getNomeAutor() {
        return $this->nomeAutor;
    }

    public function setNomeAutor($nomeAutor) {
        $this->nomeAutor = $nomeAutor;
    }

    public function getBiografiaAutor() {
        return $this->biografiaAutor;
    }

    public function setBiografiaAutor($biografiaAutor) {
        $this->biografiaAutor = $biografiaAutor;
    }

    public function getDatanascAutor() {
        return $this->datanascAutor;
    }

    public function setDatanascAutor($datanascAutor) {
        $this->datanascAutor = $datanascAutor;
    }

    public function getDatafaleAutor() {
        return $this->datafaleAutor;
    }

    public function setDatafaleAutor($datafaleAutor) {
        $this->datafaleAutor = $datafaleAutor;
    }

    public function getNacionalidadeAutor() {
        return $this->nacionalidadeAutor;
    }

    public function setNacionalidadeAutor($nacionalidadeAutor) {
        $this->nacionalidadeAutor = $nacionalidadeAutor;
    }

    // construtor
    public function __construct() {
        $this->conexao = new Conexao();
    }

    // insert
    public function inserir() {
        $sql = "INSERT INTO autor (`nome_autor`, `biografia_autor`, `data_nascimento_autor`, `data_falecimento_autor`, `nacionalidade_autor`) VALUES (?,?,?,?,?);";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('sssss', $this->nomeAutor, $this->biografiaAutor, $this->datanascAutor, $this->datafaleAutor, $this->nacionalidadeAutor);
        return $stmt->execute();
    }

    // listar
    public function listar() {
        $sql = "SELECT * FROM autor";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $autores = [];

        while ($autor = $result->fetch_assoc()) {
            $autores[] = $autor;
        }

        return $autores;
    }

    // buscar por id
    public function buscarPorId($codAutor) {
        $sql = "SELECT * FROM autor WHERE cod_autor = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codAutor);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // update
    public function atualizar($codAutor) {
        $sql = "UPDATE autor SET nome_autor = ?, biografia_autor = ?, data_nascimento_autor = ?, data_falecimento_autor = ?, nacionalidade_autor = ? WHERE cod_autor = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('sssssi', $this->nomeAutor, $this->biografiaAutor, $this->datanascAutor, $this->datafaleAutor, $this->nacionalidadeAutor, $codAutor);
        return $stmt->execute();
    }

    // delete
    public function excluir($codAutor) {
        try {
            $sql = "DELETE FROM autor WHERE cod_autor = ?";
            $stmt = $this->conexao->getConexao()->prepare($sql);
            $stmt->bind_param('i', $codAutor);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "<script type='text/javascript'>alert('Não foi possível excluir o autor. Provavelmente ele está associado a algum livro.');</script>";
        }
    }
}

?>