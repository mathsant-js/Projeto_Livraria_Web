document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("nomecartao").addEventListener("blur", validarNome);
  document.getElementById("nomecartao").addEventListener("input", validarNome);
  document
    .getElementById("numerocartao")
    .addEventListener("blur", validarNumero);
  document
    .getElementById("numerocartao")
    .addEventListener("input", validarNumero);
  document.getElementById("cvv").addEventListener("blur", validarCvv);
  document.getElementById("cvv").addEventListener("input", validarCvv);
  document
    .getElementById("validadecartao")
    .addEventListener("blur", validarValidadeCartao);
  document
    .getElementById("validadecartao")
    .addEventListener("input", validarValidadeCartao);
  document
    .getElementById("cartaoForm")
    .addEventListener("submit", validarFormulario);
});

function validarNome() {
  const nome = document.getElementById("nomecartao").value.trim();
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

function validarNumero() {
  const numero = document.getElementById("numerocartao").value.trim();
  const erro = document.getElementById("erroNumero");
  if (numero === "") {
    erro.textContent = "Digite o número do cartão";
    return false;
  } else if (numero.length < 13) {
    erro.textContent = "Número do cartão incorreto";
    return false;
  }
  erro.textContent = "";
  return true;
}

function validarCvv() {
  const cvv = document.getElementById("cvv").value.trim();
  const erro = document.getElementById("erroCvv");
  if (cvv === "") {
    erro.textContent =
      "Digite o número do CVV. São os 3 números das costas do cartão";
    return false;
  } else if (cvv.length !== 3) {
    erro.textContent = "CVV incorreto";
  }
  erro.textContent = "";
  return true;
}

function validarValidadeCartao() {
  const validade = document.getElementById("validadecartao").value.trim();
  const regex = /^(0[1-9]|1[0-2])\/\d{2}$/;
  const erro = document.getElementById("erroValidade");
  if (validade === "") {
    erro.textContent = "Digite a validade do cartão";
    return false;
  } else if (!regex.test(validade)) {
    erro.textContent = "Validade do cartão inválida";
    return false;
  }
  erro.textContent = "";
  return true;
}

function validarFormulario(event) {
    const nomeValido = validarNome();
    const numeroValido = validarNumero();
    const cvvValido = validarCvv();
    const validadeCartaoValida = validarValidadeCartao();
  
    if (!nomeValido || !numeroValido || !cvvValido || !validadeCartaoValida) {
      event.preventDefault(); // Impede o envio do formulário
      Toastify({
        text: "Ops! Um ou mais campos foram digitados incorretamente",
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
          background: "#ef4444",
        },
      }).showToast();
    } else {
      Toastify({
        text: "Pagamento feito com sucesso",
        duration: 5000,
        close: true,
        gravity: "end",
        position: "right",
        stopOnFocus: true,
        style: {
          background: "#0ac70a",
        },
      }).showToast();
      window.location="/Projeto_Livraria_Web/src/views/sucessoPagamento.php";
    }
  }
