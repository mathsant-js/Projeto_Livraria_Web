<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Logando o conteúdo de $_POST para depuração
error_log('Dados recebidos: ' . print_r($_POST, true)); // Verifica se o dado está sendo enviado corretamente
if (isset($_POST['cod_autor'])) {
    error_log("O valor de cod_autor: " . $_POST['cod_autor']); // Para ver no log
}

// Exibir erros especificos
if  (!$_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Não é post";
} else if (empty($_POST['cod_autor'])) {
    echo "Vazio<br>";
    error_log("Codigo de genero vazio - ajaxHandler");
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/autorController.php';

// Verifica se a requisição é POST e se o parâmetro 'cod_autor' foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cod_autor'])) {
    $controller = new AutorController();
    $controller->exibirDescricaoAjax();  // Chama o método que lida com a requisição AJAX
    error_log("Requisicao AJAX processada com sucesso");
} else {
    error_log("Erro: Requisição inválida ou cod_autor não encontrado");
    echo json_encode(['error' => 'Requisicao invalida']);
}
