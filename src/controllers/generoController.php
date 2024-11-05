<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/genero.php';

class GeneroController {
    private $genero;

    public function __construct()
    {
        $this->genero = new Genero();

        if($_GET['acao'] == 'inserir') {
            $this->inserir();
            header('Location: ../views/index.php?acao=semacao');
        } else if($_GET['acao'] == 'atualizar') {
            $this->atualizar($_POST['codigo']);
            header('Location: ../views/index.php?acao=semacao');
        } else if($_GET['acao'] == 'excluir') {
            $this->excluir($_POST['codigo']);
            header('Location: ../views/index.php?acao=semacao');
        }
    }

    public function inserir() {
        $this->genero->setNomeGenero($_POST['nome']);
        $this->genero->setDescricaoGenero($_POST['descricao']);

        $this->genero->inserir();
    }

    public function listar() {
        return $this->genero->listar();
    }

    public function buscarPorId($codGenero){
        return $this->genero->buscarPorId($codGenero);
    }

    public function atualizar($codGenero) {
        $this->genero->setNomeGenero($_POST['nome']);
        $this->genero->setDescricaoGenero($_POST['descricao']);

        $this->genero->atualizar($codGenero);
    }

    public function excluir($codGenero) {
        $this->genero->excluir($codGenero);
    }
}

new GeneroController();