<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/connection/conexao.php';

class Livro {
    private $codLivro;
    private $nomeLivro;
    private $isbnLivro;
    private $dataLancamento;
    private $precoLivro;
    private $descricaoLivro;
    private $conexao;

    public function getCodLivro() {
        return $this->codLivro;
    }

    public function setCodLivro($codLivro) {
        $this->codLivro = $codLivro;
    }

    public function getNomeLivro() {
        return $this->nomeLivro;
    }

    public function setNomeLivro($nomeLivro) {
        $this->nomeLivro = $nomeLivro;
    }

    public function getIsbnLivro() {
        return $this->isbnLivro;
    }

    public function setIsbnLivro($isbnLivro) {
        $this->isbnLivro = $isbnLivro;
    }

    public function getDataLancamento() {
        return $this->dataLancamento;
    }

    public function setDataLancamento($dataLancamento) {
        $this->dataLancamento = $dataLancamento;
    }

    public function getPrecoLivro() {
        return $this->precoLivro;
    }

    public function setPrecoLivro($precoLivro) {
        $this->precoLivro = $precoLivro;
    }

    public function getDescricaoLivro() {
        return $this->descricaoLivro;
    }

    public function setDescricaoLivro($descricaoLivro) {
        $this->descricaoLivro = $descricaoLivro;
    }

    // construtor
    public function __construct() {
        $this->conexao = new Conexao();
    }

    // insert
    public function inserir() {
        $sql = "INSERT INTO livro (`nome_livro`, `isbn_livro`, `data_lancamento`, `preco_livro`, `descricao_livro`) VALUES (?,?,?,?,?);";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('sssss', $this->nomeLivro, $this->isbnLivro, $this->dataLancamento, $this->precoLivro, $this->descricaoLivro);
        return $stmt->execute();
    }

    // listar
    public function listar() {
        $sql = "SELECT * FROM livro";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $livros = [];

        while ($livro = $result->fetch_assoc()) {
            $livros[] = $livro;
        }

        return $livros;
    }

    // buscar por id
    public function buscarPorId($codLivro) {
        $sql = "SELECT * FROM livro WHERE cod_livro = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codLivro);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function buscarNomeAutor() {
        $sql = "SELECT cod_autor, nome_autor FROM autor";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $autores = [];

        while ($autor = $result->fetch_assoc()) {
            $autores[] = $autor;
        }

        return $autores;
    }

    public function buscarNomeEditora() {
        $sql = "SELECT cod_editora, nome_editora FROM editora";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $editoras = [];

        while ($editora = $result->fetch_assoc()) {
            $editoras[] = $editora;
        }

        return $editoras;
    }

    public function buscarNomeGenero() {
        $sql = "SELECT cod_genero, nome_genero FROM genero";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $generos = [];

        while ($genero = $result->fetch_assoc()) {
            $generos[] = $genero;
        }

        return $generos;
    }

    // update
    public function atualizar($codLivro) {
        $sql = "UPDATE livro SET nome_livro = ?, isbn_livro = ?, data_lancamento = ?, preco_livro = ?, descricao_livro = ? WHERE cod_livro = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('sssssi', $this->nomeLivro, $this->isbnLivro, $this->dataLancamento, $this->precoLivro, $codLivro);
        return $stmt->execute();
    }

    // delete
    public function excluir($codLivro) {
        $sql = "DELETE FROM livro WHERE cod_livro = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codLivro);
        return $stmt->execute();
    }
}