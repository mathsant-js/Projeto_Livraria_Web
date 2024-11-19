function exibirDescricao(id) {
  if (!id) {
    console.error("ID inválido fornecido para a função exibirDescricao.");
    return;
  }

  console.log("ID fornecido:", id);

  // Faz a requisição AJAX
  fetch(
    "/Projeto_Livraria_Web/src/controllers/ajaxHandlers/ajaxHandlerAutor.php",
    {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: new URLSearchParams({
        cod_autor: id,
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
        document.getElementById("nome").innerHTML = data.nome_autor;
        document.getElementById("nacionalidade").innerHTML =
          "Nacionalidade: " + data.nacionalidade_autor;
        document.getElementById("datanascimento").innerHTML =
          "Data de Nascimento: " + data.data_nascimento_autor;
        if (data.data_falecimento_autor == "0000-00-00") {
          document.getElementById("datafalecimento").innerHTML =
            "Data de Falecimento: N/A";
        } else {
          document.getElementById("datafalecimento").innerHTML =
            "Data de Falecimento: " + data.data_falecimento_autor;
        }
        document.getElementById("biografia").innerHTML =
          "Biografia: " + data.biografia_autor;

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
