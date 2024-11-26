function exibirDescricao(id) {
    if (!id) {
      console.error("ID inválido fornecido para a função exibirDescricao.");
      return;
    }
  
    console.log("ID fornecido:", id);
  
    // Faz a requisição AJAX
    fetch(
      "/Projeto_Livraria_Web/src/controllers/ajaxHandlers/ajaxHandlerLivro.php",
      {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
          cod_livro: id,
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
          document.getElementById("nome").innerHTML = data.nome_livro;
          document.getElementById("isbn").innerHTML = "ISBN: " + data.isbn_livro;
          document.getElementById("datalancamento").innerHTML =
            "Data de Lançamento: " + data.data_lancamento;
          document.getElementById("preco").innerHTML =
            "Preço: " + data.preco_livro;
          document.getElementById("autor").innerHTML =
            "Autor: " + data.autores;
          document.getElementById("genero").innerHTML =
            "Gênero: " + data.nome_genero;
          document.getElementById("editora").innerHTML =
            "Editora: " + data.nome_editora;
          document.getElementById("descricao").innerHTML =
            "Descrição: " + data.descricao_livro;
  
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
  