<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/connection/conexao.php';

class Livro
{
    private $codLivro;
    private $nomeLivro;
    private $isbnLivro;
    private $dataLancamento;
    private $precoLivro;
    private $descricaoLivro;
    private $codGenero;
    private $codEditora;
    private $conexao;

    public function getCodLivro()
    {
        return $this->codLivro;
    }

    public function setCodLivro($codLivro)
    {
        $this->codLivro = $codLivro;
    }

    public function getNomeLivro()
    {
        return $this->nomeLivro;
    }

    public function setNomeLivro($nomeLivro)
    {
        $this->nomeLivro = $nomeLivro;
    }

    public function getIsbnLivro()
    {
        return $this->isbnLivro;
    }

    public function setIsbnLivro($isbnLivro)
    {
        $this->isbnLivro = $isbnLivro;
    }

    public function getDataLancamento()
    {
        return $this->dataLancamento;
    }

    public function setDataLancamento($dataLancamento)
    {
        $this->dataLancamento = $dataLancamento;
    }

    public function getPrecoLivro()
    {
        return $this->precoLivro;
    }

    public function setPrecoLivro($precoLivro)
    {
        $this->precoLivro = $precoLivro;
    }

    public function getDescricaoLivro()
    {
        return $this->descricaoLivro;
    }

    public function setDescricaoLivro($descricaoLivro)
    {
        $this->descricaoLivro = $descricaoLivro;
    }

    public function getCodGenero()
    {
        return $this->codGenero;
    }

    public function setCodGenero($codGenero)
    {
        $this->codGenero = $codGenero;
    }

    public function getCodEditora()
    {
        return $this->codEditora;
    }

    public function setCodEditora($codEditora)
    {
        $this->codEditora = $codEditora;
    }

    // construtor
    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    // insert
    public function inserir()
    {
        $sql = "INSERT INTO livro (`nome_livro`, `isbn_livro`, `data_lancamento`, `preco_livro`, `descricao_livro`, `cod_genero`, `cod_editora`) VALUES (?,?,?,?,?,?,?);";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('sssssss', $this->nomeLivro, $this->isbnLivro, $this->dataLancamento, $this->precoLivro, $this->descricaoLivro, $this->codGenero, $this->codEditora);
        return $stmt->execute();
    }

    // listar
    public function listar()
    {
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
    public function buscarPorId($codLivro)
    {
        $sql = "SELECT * FROM livro WHERE cod_livro = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codLivro);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function buscarNomeAutor()
    {
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

    public function buscarNomeEditora()
    {
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

    public function buscarNomeGenero()
    {
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

    public function buscarAutoresPorLivro($codLivro)
    {
        $sql = "SELECT cod_autor FROM autorlivro WHERE cod_livro = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codLivro);
        $stmt->execute();
        $result = $stmt->get_result();
        $autores = [];

        while ($row = $result->fetch_assoc()) {
            $autores[] = $row['cod_autor']; // Apenas códigos de autores
        }

        return $autores; // Encapsulado e seguro
    }

    public function buscarLivro($filtroEditora = null, $filtroAutor = null)
    {
        $sql = "SELECT 
                l.cod_livro AS livro_id,
                l.nome_livro,
                l.preco_livro,
                l.cod_editora AS codigo_editora,
                e.nome_editora AS editora,
                (SELECT 
                 la.cod_autor -- Código do autor
                 FROM autorlivro la
                 WHERE la.cod_livro = l.cod_livro
                 LIMIT 1) AS codigo_autor, 
                (SELECT 
                 a.nome_autor -- Nome do autor
                 FROM autorlivro la
                 JOIN autor a ON la.cod_autor = a.cod_autor
                 WHERE la.cod_livro = l.cod_livro
                 LIMIT 1) AS autor
                FROM livro l
                LEFT JOIN editora e ON l.cod_editora = e.cod_editora
                WHERE 1=1;";
        $params = [];
        $types = ""; // String para tipos do bind_param (e.g., 's', 'i')

        if ($filtroEditora) {
            $sql = "";
            $sql .= " AND e.nome LIKE ?";
            $params[] = "%$filtroEditora%";
            $types .= "s"; // Tipo string
        }

        if ($filtroAutor) {
            $sql .= " AND EXISTS (
                SELECT 1 
                FROM autor_livro la
                JOIN autor a ON la.cod_autor = a.cod_autor
                WHERE la.cod_livro = l.id AND a.nome LIKE ?
            )";
            $params[] = "%$filtroAutor%";
            $types .= "s"; // Tipo string
        }

        $stmt = $this->conexao->getConexao()->prepare($sql);
        if ($params) {
            // Passa os parâmetros dinamicamente
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function buscarLivroParaCompra($codLivro)
    {
        // Query SQL para buscar os detalhes do livro
        $sql = "
        SELECT 
            l.cod_livro AS livro_id,
            l.nome_livro,
            l.preco_livro,
            l.descricao_livro,
            g.nome_genero AS genero,
            e.nome_editora AS editora,
            (SELECT a.nome_autor 
             FROM autorlivro la
             JOIN autor a ON la.cod_autor = a.cod_autor
             WHERE la.cod_livro = l.cod_livro
             LIMIT 1) AS autor
        FROM livro l
        LEFT JOIN editora e ON l.cod_editora = e.cod_editora
        LEFT JOIN genero g ON l.cod_genero = g.cod_genero
        WHERE l.cod_livro = ?
    ";

        // Prepara a consulta
        $stmt = $this->conexao->getConexao()->prepare($sql);

        if (!$stmt) {
            throw new Exception("Erro ao preparar a consulta: " . $this->conexao->getConexao()->error);
        }

        // Faz o bind do parâmetro (tipo inteiro)
        $stmt->bind_param("i", $codLivro);

        // Executa a consulta
        $stmt->execute();

        // Obtém o resultado
        $result = $stmt->get_result();

        // Retorna os dados como um array associativo, ou null se não encontrado
        return $result->fetch_assoc();
    }

    public function buscarDetalhesPorId($codLivro)
    {
        $sql = "
            SELECT 
                l.*, 
                g.nome_genero, 
                e.nome_editora, 
                GROUP_CONCAT(a.nome_autor SEPARATOR ', ') AS autores
            FROM livro l
            LEFT JOIN genero g ON l.cod_genero = g.cod_genero
            LEFT JOIN editora e ON l.cod_editora = e.cod_editora
            LEFT JOIN autorlivro la ON l.cod_livro = la.cod_livro
            LEFT JOIN autor a ON la.cod_autor = a.cod_autor
            WHERE l.cod_livro = ?
            GROUP BY l.cod_livro
        ";

        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param("i", $codLivro);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $dados = $resultado->fetch_assoc();

        $stmt->close();

        return $dados;
    }


    // update
    public function atualizar($codLivro)
    {
        $sql = "UPDATE livro SET nome_livro = ?, isbn_livro = ?, data_lancamento = ?, preco_livro = ?, descricao_livro = ?, cod_genero = ?, cod_editora = ? WHERE cod_livro = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ssssssii', $this->nomeLivro, $this->isbnLivro, $this->dataLancamento, $this->precoLivro, $this->descricaoLivro, $this->codGenero, $this->codEditora, $codLivro);
        if ($stmt->execute()) {
            return true;
        } else {
            error_log("Erro ao atualizar livro: " . $stmt->error);
            return false;
        }
    }

    // delete
    public function excluir($codLivro)
    {
        $sql = "DELETE FROM livro WHERE cod_livro = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codLivro);
        return $stmt->execute();
    }
}
