function exibirDescricao(id) {
  if (!id) {
    console.error("ID inválido fornecido para a função exibirDescricao.");
    return;
  }

  console.log("ID fornecido:", id);

  // Faz a requisição AJAX
  fetch("/Projeto_Livraria_Web/src/controllers/ajaxHandlers/ajaxHandler.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: new URLSearchParams({
      cod_genero: id,
    }),
  })
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
        document.getElementById("titulo").innerHTML =
          "Gênero " + data.nome_genero;
        document.getElementById("descricao").innerHTML = data.descricao_genero;

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
