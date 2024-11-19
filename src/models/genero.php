<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/connection/conexao.php';

class Genero {
    private $codGenero;
    private $nomeGenero;
    private $descricaoGenero;
    private $conexao;

    public function getCodGenero() {
        return $this->codGenero;
    }

    public function setCodGenero($codGenero) {
        $this->codGenero = $codGenero;
    }

    public function getNomeGenero() {
        return $this->nomeGenero;
    }

    public function setNomeGenero($nomeGenero) {
        $this->nomeGenero = $nomeGenero;
    }

    public function getDescricaoGenero() {
        return $this->descricaoGenero;
    }

    public function setDescricaoGenero($descricaoGenero) {
        $this->descricaoGenero = $descricaoGenero;
    }

    // construtor
    public function __construct() {
        $this->conexao = new Conexao();
    }

    // insert
    public function inserir() {
        $sql = "INSERT INTO genero (`nome_genero`, `descricao_genero`) VALUES (?,?);";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ss', $this->nomeGenero, $this->descricaoGenero);
        return $stmt->execute();
    }

    // listar
    public function listar() {
        $sql = "SELECT * FROM genero";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $generos = [];

        while ($genero = $result->fetch_assoc()) {
            $generos[] = $genero;
        }

        return $generos;
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

    // buscar por id
    public function buscarPorId($codGenero) {
        $sql = "SELECT * FROM genero WHERE cod_genero = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codGenero);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // update
    public function atualizar($codGenero) {
        $sql = "UPDATE genero SET nome_genero = ?, descricao_genero = ? WHERE cod_genero = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ssi', $this->nomeGenero, $this->descricaoGenero, $codGenero);
        return $stmt->execute();
    }

    // delete
    public function excluir($codGenero) {
        $sql = "DELETE FROM genero WHERE cod_genero = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $codGenero);
        return $stmt->execute();
    }
}