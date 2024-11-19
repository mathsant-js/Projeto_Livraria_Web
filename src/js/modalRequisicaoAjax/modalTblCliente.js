function exibirDescricao(id) {
  if (!id) {
    console.error("ID inválido fornecido para a função exibirDescricao.");
    return;
  }

  console.log("ID fornecido:", id);

  // Faz a requisição AJAX
  fetch(
    "/Projeto_Livraria_Web/src/controllers/ajaxHandlers/ajaxHandlerCliente.php",
    {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: new URLSearchParams({
        cod_cliente: id,
      }),
    }
  )
    .then((response) => {
      if (!response.ok) {
        throw new Error("Erro ao buscar dados: " + response.status);
      }
      return response.json();
    })
    .then((data) => {
      if (data.error) {
        alert(data.error); // Irá mostrar a mensagem de erro
      } else {
        document.getElementById("nome").innerHTML = data.nome_cliente;
        document.getElementById("cpf").innerHTML = "CPF: " + data.cpf_cliente;
        document.getElementById("datanascimento").innerHTML =
          "Data de Nascimento: " + data.data_nascimento_cliente;
        document.getElementById("email").innerHTML =
          "Email do Cliente: " + data.email_cliente;
        document.getElementById("telefone").innerHTML =
          "Telefone do Cliente: " + data.telefone_cliente;
        document.getElementById("endereco").innerHTML =
          "Endereço do Cliente: " + data.endereco_cliente;
        document.getElementById("senha").innerHTML =
          "Senha do Cliente: " + data.senha_cliente;

        const modal = new bootstrap.Modal(
          document.getElementById("exampleModal")
        );
        modal.show();
      }
    })
    .catch((error) => {
      console.error("Erro ao buscar dados: ", error);
    });
  console.log("ID enviado para o PHP:", id); // Verifique se o ID está sendo enviado corretamente
}
