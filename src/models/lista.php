<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/connection/conexao.php';

class Lista
{
    private $codLista;
    private $datacriacaoLista;
    private $codCliente;
    private $conexao;

    public function getCodLista()
    {
        return $this->codLista;
    }

    public function setCodLista($codLista)
    {
        $this->codLista = $codLista;
    }

    public function getDataCriacaoLista()
    {
        return $this->datacriacaoLista;
    }

    public function setDataCriacaoLista($datacriacaoLista)
    {
        $this->datacriacaoLista = $datacriacaoLista;
    }

    public function getCodCliente()
    {
        return $this->codCliente;
    }

    public function setCodCliente($codCliente)
    {
        $this->codCliente = $codCliente;
    }

    // construtor
    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    // insert
    public function inserir()
    {
        $sql = "INSERT INTO lista (`data_criacao`, `cod_cliente`) VALUES (?,?);";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ss', $this->datacriacaoLista, $this->codCliente);
        return $stmt->execute();
    }

    // listar  - provavelmente não será usado
    public function listar()
    {
        $sql = "SELECT * FROM lista";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $listas = [];

        while ($lista = $result->fetch_assoc()) {
            $listas[] = $lista;
        }

        return $listas;
    }

    // buscar por id da lista
    public function buscarPorId($codLista)
    {
        // Query SQL para buscar os detalhes da lista
        $sql = "
            SELECT 
                l.cod_lista
                l.data_criacao,
                l.cod_cliente,
                (SELECT lv.cod_livro
                FROM livrossalvos ls
                JOIN livro lv ON ls.cod_livro = lv.cod_livro
                WHERE ls.cod_livro = l.cod_livro
                LIMIT 1) AS codlivro
                (SELECT lv.nome_livro
                FROM livrossalvos ls
                JOIN livro lv ON ls.cod_livro = lv.cod_livro
                WHERE ls.cod_livro = l.cod_livro
                LIMIT 1) AS livro
            FROM lista l
            WHERE l.cod_lista = ?
        ";

        // Prepara a consulta
        $stmt = $this->conexao->getConexao()->prepare($sql);

        if (!$stmt) {
            throw new Exception("Erro ao preparar a consulta: " . $this->conexao->getConexao()->error);
        }

        // Faz o bind do parâmetro (tipo inteiro)
        $stmt->bind_param("i", $codLista);

        // Executa a consulta
        $stmt->execute();

        // Obtém o resultado
        $result = $stmt->get_result();

        // Retorna os dados como um array associativo, ou null se não encontrado
        return $result->fetch_assoc();
    }

    // buscar por id do cliente
    public function buscarPorIdDoCliente($codCliente)
    {
        // Query SQL para buscar os detalhes da lista
        $sql = "SELECT * FROM lista WHERE cod_cliente = ?";
        
        // Prepara a consulta
        $stmt = $this->conexao->getConexao()->prepare($sql);

        if (!$stmt) {
            throw new Exception("Erro ao preparar a consulta: " . $this->conexao->getConexao()->error);
        }

        // Faz o bind do parâmetro (tipo inteiro)
        $stmt->bind_param("i", $codCliente);

        // Executa a consulta
        $stmt->execute();

        // Obtém o resultado
        $result = $stmt->get_result();

        // Retorna os dados como um array associativo, ou null se não encontrado
        return $result->fetch_assoc();
    }

    // listar livros de um cliente
    public function listarLivros($codLista) {
        $sql = "SELECT * FROM livrossalvos WHERE cod_lista = ? ORDER BY data_salvamento_livro DESC";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codLista);
        $stmt->execute();
        $result = $stmt->get_result();
        $livros = [];

        while ($livro = $result->fetch_assoc()) {
            $livros[] = $livro;
        }

        return $livros;
    }

    // update - provavelmente não será usado
    public function atualizar($codLista)
    {
        $sql = "UPDATE lista SET data_criacao = ?, cod_cliente = ? WHERE cod_lista = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ssi', $this->datacriacaoLista, $this->codCliente, $codLista);
        if ($stmt->execute()) {
            return true;
        } else {
            error_log("Erro ao atualizar lista: " . $stmt->error);
            return false;
        }
    }

    // delete - provavelmente não será usado
    public function excluir($codLista)
    {
        $sql = "DELETE FROM lista WHERE cod_lista = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codLista);
        return $stmt->execute();
    }

    public function inserirLivro($codLista, $codLivro)
    {
        $data = date("Y-m-d");
        $sql = "INSERT INTO livrossalvos (cod_livro, cod_lista, data_salvamento_livro) VALUES (?, ?, ?);";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('iis', $codLivro, $codLista, $data);
        return $stmt->execute();
    }

    public function excluirLivro($codLista, $codLivro)
    {
        $sql = "DELETE FROM livrossalvos WHERE cod_lista = ? && cod_livro = ?;";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ii', $codLista, $codLivro);
        return $stmt->execute();
    }
}
