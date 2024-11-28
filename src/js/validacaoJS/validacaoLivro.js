// Adiciona eventos aos campos
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("nome").addEventListener("blur", validarNome);
  document.getElementById("nome").addEventListener("input", validarNome);
  document.getElementById("isbn").addEventListener("input", validarIsbn);
  document
    .getElementById("data")
    .addEventListener("blur", validarDataLancamento);
  document
    .getElementById("data")
    .addEventListener("input", validarDataLancamento);
  document
    .getElementById("descricao")
    .addEventListener("blur", validarDescricao);
  document
    .getElementById("descricao")
    .addEventListener("input", validarDescricao);
  document
    .getElementById("data")
    .addEventListener("input", validarDataLancamento);
  document
    .getElementById("data")
    .addEventListener("blur", validarDataLancamento);
  const isbnInput = document.getElementById("isbn");

  isbnInput.addEventListener("input", function () {
    let valor = isbnInput.value.replace(/[^0-9Xx]/g, ""); // Remove caracteres não permitidos, exceto 'X'
    let formatado = "";
    // Formatação para ISBN-13: XXX-XX-XXXXX-XX-X
    if (valor.length <= 10) {
      if (valor.length > 0) formatado += valor.slice(0, 1); // 1º número
      if (valor.length > 1) formatado += "-" + valor.slice(1, 3); // 2 primeiros números
      if (valor.length > 3) formatado += "-" + valor.slice(3, 9); // 6 números seguintes
      if (valor.length > 9) formatado += "-" + valor.slice(9, 10); // Último número
    }
    // Caso o valor tenha 13 ou menos dígitos, aplicar formatação de ISBN-13
    else if (valor.length <= 13) {
      if (valor.length > 0) formatado += valor.slice(0, 3); // 3 primeiros números
      if (valor.length > 3) formatado += "-" + valor.slice(3, 5); // 2 números seguintes
      if (valor.length > 5) formatado += "-" + valor.slice(5, 10); // 5 números seguintes
      if (valor.length > 10) formatado += "-" + valor.slice(10, 12); // 2 números seguintes
      if (valor.length > 12) formatado += "-" + valor.slice(12, 13); // Último número
    }
    isbnInput.value = formatado;
  });
  const precoInput = document.getElementById("preco");
  const erroPreco = document.getElementById("erroPreco");

  precoInput.addEventListener("input", function () {
    // Remove caracteres inválidos e mantém apenas números e ponto
    let valor = precoInput.value.replace(/[^0-9.]/g, "");

    // Permite apenas um ponto como separador decimal
    const partes = valor.split(".");
    if (partes.length > 2) {
      valor = partes[0] + "." + partes.slice(1).join(""); // Mantém apenas o primeiro ponto
    }

    // Limita a parte decimal a 2 dígitos
    if (partes.length === 2) {
      partes[1] = partes[1].substring(0, 2); // Mantém apenas 2 casas decimais
      valor = partes[0] + "." + partes[1];
    }

    // Atualiza o valor do campo e limpa mensagem de erro, se necessário
    precoInput.value = valor;

    if (valor === "") {
      if (erroPreco) erroPreco.textContent = "O preço do livro é obrigatório.";
    }
    if (valor < 1) {
      erroPreco.textContent = "O livro deve custar pelo menos R$1.00";
    } else {
      if (erroPreco) erroPreco.textContent = "";
    }
  });
  precoInput.addEventListener("blur", function () {
    // Remove caracteres inválidos e mantém apenas números e ponto
    let valor = precoInput.value.replace(/[^0-9.]/g, "");

    // Permite apenas um ponto como separador decimal
    const partes = valor.split(".");
    if (partes.length > 2) {
      valor = partes[0] + "." + partes.slice(1).join(""); // Mantém apenas o primeiro ponto
    }

    // Limita a parte decimal a 2 dígitos
    if (partes.length === 2) {
      partes[1] = partes[1].substring(0, 2); // Mantém apenas 2 casas decimais
      valor = partes[0] + "." + partes[1];
    }

    // Atualiza o valor do campo e limpa mensagem de erro, se necessário
    precoInput.value = valor;

    if (valor === "") {
      erroPreco.textContent = "O preço do livro é obrigatório.";
    }
    if (valor < 1) {
      erroPreco.textContent = "O livro deve custar pelo menos R$1.00";
    } else {
      if (erroPreco) erroPreco.textContent = "";
    }
  });
  document
    .getElementById("livroForm")
    .addEventListener("submit", validarFormulario);
});

// Valida o campo Nome
function validarNome() {
  const nome = document.getElementById("nome").value.trim();
  const erro = document.getElementById("erroNome");
  if (nome === "") {
    erro.textContent = "O nome é obrigatório.";
    return false;
  } else if (nome.length < 3) {
    erro.textContent = "O nome deve ter no mínimo 3 caracteres";
    return false;
  }

  erro.textContent = ""; // Limpa o erro
  return true;
}

function validarIsbn() {
  const isbnInput = document.getElementById("isbn");
  const erro = document.getElementById("erroIsbn");
  const isbn = isbnInput.value.trim();

  if (isbn.length != 12) {
    if (isbn.length != 16) {
      if (isbn.length != 17) {
        erro.textContent = "O ISBN deve ser XX-X-XXXXXX-X ou XXX-XX-XXXXX-XX-X";
        console.log(isbn.length);
        return false;
      } else if (isbn.length != 13) {
        erro.textContent = "O ISBN deve ser XX-X-XXXXXX-X ou XXX-XX-XXXXX-XX-X";
        return false;
      } else {
        erro.textContent = "";
        console.log(isbn.length);
        return true;
      }
    } else {
      erro.textContent = "";
      return true;
    }
  }
  erro.textContent = "";
  return true;
}

function validarDataLancamento() {
  const dataValida = document.getElementById("data").value;
  const data = new Date(document.getElementById("data").value);
  const hoje = new Date();
  const erro = document.getElementById("erroDataLancamento");
  if (!dataValida) {
    erro.textContent = "A data de lançamento é obrigatória.";
    return false;
  } else if (data > hoje) {
    erro.textContent = "A data de lançamento maior que a data atual";
    return false;
  }

  erro.textContent = ""; // Limpa o erro
  return true;
}

function validarDescricao() {
  const descricao = document.getElementById("descricao").value.trim();
  const erro = document.getElementById("erroDescricao");
  if (descricao === "") {
    erro.textContent = "A descrição do livro é obrigatória.";
    return false;
  } else if (descricao.length < 10) {
    erro.textContent = "A descrição deve ter mais de 10 caracteres.";
    return false;
  }

  erro.textContent = ""; // Limpa o erro
  return true;
}

// Valida o Formulário Completo
function validarFormulario(event) {
  const nomeValido = validarNome();
  const isbnValido = validarIsbn();
  const dataLancamentoValida = validarDataLancamento();
  const descricaoLivro = validarDescricao();
  if (!nomeValido || !isbnValido || !dataLancamentoValida || !descricaoLivro) {
    event.preventDefault(); // Impede o envio do formulário
    const modal = new bootstrap.Modal(document.getElementById("exampleModal"));
    modal.show();
  }
}
