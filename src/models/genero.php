<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/connection/conexao.php';

class Genero {
    private $codGenero;
    private $nomeGenero;
    private $descricaoGenero;

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
}