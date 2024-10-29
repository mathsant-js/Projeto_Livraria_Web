<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/autor.php';

class AutorController {
    private $autor;

    public function __construct() {
        $this->autor = new Autor();
        
        if($_GET['acao'] == 'inserir') {
            $this->inserir();
            header('Location: ../src/views/index.php?acao=semacao');
        } else if($_GET['acao'] == 'atualizar') {
            $this->atualizar($_GET['id']);
            header('Location: ../src/views/index.php?acao=semacao');
        } else if($_GET['acao'] == 'excluir') {
            $this->excluir($_GET['id']);
            header('Location: ../src/views/index.php?acao=semacao');
        }
    }

    public function inserir() {
        $this->autor->setNomeAutor($_POST['nome']);
        $this->autor->setBiografiaAutor($_POST['biografia']);
        $this->autor->setDatanascAutor($_POST['datanasc']);
        $this->autor->setDatafaleAutor($_POST['datafale']);
        $this->autor->setNacionalidadeAutor($_POST['nacionalidade']);

        $this->autor->inserir();
    }

    public function listar(){
        return $this->autor->listar();
    }

    public function buscarPorId($codAutor){
        return $this->autor->buscarPorId($codAutor);
    }

    public function atualizar($codAutor){
        $this->autor->setCodAutor($codAutor);
        $this->autor->setNomeAutor($_POST['nome']);
        $this->autor->setBiografiaAutor($_POST['biografia']);
        $this->autor->setDatanascAutor($_POST['datanasc']);
        $this->autor->setDatafaleAutor($_POST['datafale']);
        $this->autor->setNacionalidadeAutor($_POST['nacionalidade']);

        $this->autor->atualizar($codAutor);
    }

    public function excluir($codAutor) {
        $this->autor->excluir($codAutor);
    }
}

new AutorController();

?>