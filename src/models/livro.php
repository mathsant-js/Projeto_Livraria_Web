<?php 

class Livro {
    private $codLivro;
    private $nomeLivro;
    private $isbnLivro;
    private $dataLancamento;
    private $precoLivro;
    private $descricaoLivro;

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
}