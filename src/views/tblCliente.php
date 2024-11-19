<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/clienteController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Book</title>
    <link rel="stylesheet" href="../assets/scss/main.css">
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/modalRequisicaoAjax/modalTblCliente.js"></script>
</head>

<body class="background-dark-light">
    <?php require_once '../components/header.php'; ?>
    <div class="container w-100 mx-auto mt-4">
        <h5><a href="javascript:history.back()" class="link-warning">< Voltar</a></h5>
        <div class="border-warning bg-dark text-white p-4 mx-auto rounded-4 order-1 order-lg-2 mt-4 overflow-x-scroll">
            <h2 class="text-warning ms-md-3 mb-4">Lista de Clientes</h2>

            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th>Mais Informações</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $clienteController = new ClienteController();
                        $clientes = $clienteController->listar();
                        
                        foreach($clientes as $cliente) {
                    ?>
                        <tr>
                            <td><?php echo $cliente['cod_cliente'];?></td>
                            <td><?php echo $cliente['nome_cliente'];?></td>
                            <td><?php echo $cliente['cpf_cliente'];?></td>
                            <td><?php echo $cliente['data_nascimento_cliente'];?></td>
                            <td>
                                <a onclick="exibirDescricao(<?php echo $cliente['cod_cliente']; ?>)" href="#" class="btn btn-warning text-light">Mais Informações</a>
                            </td>
                            <td>
                                <a href="<?php echo "formClienteUpdDlt.php?acao=upd&codCliente=" . $cliente['cod_cliente'];?>" class="btn btn-warning text-white text-center me-2">Atualizar</a>
                                <a href="<?php echo "formClienteUpdDlt.php?acao=dlt&codCliente=" . $cliente['cod_cliente'];?>" type="submit" class="btn btn-danger text-white text-center px-4">Excluir</a>
                            </td>
                        </tr>
                    </a>

                    <?php } ?>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content bg-dark">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Informações do Cliente</h1>
                                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h4 id="nome"></h4>
                                    <ul>
                                        <li id="cpf"></li>
                                        <li id="datanascimento"></li>
                                        <li id="email"></li>
                                        <li id="telefone"></li>
                                        <li id="endereco"></li>
                                        <li id="senha"></li>
                                    </ul>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-warning btn-lg text-light" data-bs-dismiss="modal">Ok</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tbody>
            </table>
            <a href="formClienteCrt.php?acao=crt" class="btn btn-warning btn-lg text-white mt-sm-2">Cadastrar Cliente</a>
        </div>
    </div>

    <div class="w-100 mt-5 pt-5">
        <?php require_once '../components/footer.php'; ?>
    </div>
</body>
</html>