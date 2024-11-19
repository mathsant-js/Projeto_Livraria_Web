<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/models/genero.php';

class GeneroController {
    private $genero;

    public function __construct()
    {
        $this->genero = new Genero();

        if ($_GET['acao'] ?? null) {
            if($_GET['acao'] == 'inserir') {
                $this->inserir();
                header('Location: ../views/tblGenero.php?acao=semacao');
            } else if($_GET['acao'] == 'atualizar') {
                $this->atualizar($_POST['codigo']);
                header('Location: ../views/tblGenero.php?acao=semacao');
            } else if($_GET['acao'] == 'excluir') {
                $this->excluir($_POST['codigo']);
                header('Location: ../views/tblGenero.php?acao=semacao');
            }
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

    /* 
    *  Função para exibir a descrição de um gênero em formato JSON, 
    *  utilizando o método AJAX para não precisar atualizar a página
    */
    public function exibirDescricaoAjax() {
        if (!isset($_POST['cod_genero']) || empty($_POST['cod_genero'])) {
            echo json_encode(['error' => 'ID não fornecido']);
            return;
        }
    
        $id = $_POST['cod_genero'];
        $descricao = $this->genero->buscarPorId($id);
    
        if ($descricao) {
            echo json_encode($descricao); // Retorna os dados em formato JSON
        } else {
            echo json_encode(['error' => 'Gênero não encontrado']);
        }
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