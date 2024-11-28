// Adiciona eventos aos campos
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("nome").addEventListener("blur", validarNome);
    document.getElementById("nome").addEventListener("input", validarNome);
    document.getElementById("isbn").addEventListener("input", validarIsbn);
    document.getElementById("isbn").addEventListener("blur", validarIsbn);
    document.getElementById("data").addEventListener("input", validarDataLancamento);
    document.getElementById("data").addEventListener("blur", validarDataLancamento);
    document.getElementById("preco").addEventListener("input", validarPreco);
    document.getElementById("preco").addEventListener("blur", validarPreco);
    const isbnInput = document.getElementById("isbn");

    isbnInput.addEventListener("input", function () {
        let valor = isbnInput.value.replace(/[^0-9Xx]/g, ""); // Remove caracteres não permitidos, exceto 'X'

        // Aplica a formatação conforme o tamanho
        if (valor.length <= 10) {
            // Formata como ISBN-10: X-XXX-XXXXX-X
            isbnInput.value = valor
                .replace(/^(\d{1})(\d{0,3})/, "$1-$2")
                .replace(/-(\d{3})(\d{0,5})/, "-$1-$2")
                .replace(/-(\d{5})(\d{0,1})/, "-$1-$2");
        } else if (valor.length <= 13) {
            // Formata como ISBN-13: XXX-X-XXX-XXXXX-X
            isbnInput.value = valor
                .replace(/^(\d{3})(\d{0,1})/, "$1-$2")
                .replace(/-(\d{1})(\d{0,3})/, "-$1-$2")
                .replace(/-(\d{3})(\d{0,5})/, "-$1-$2")
                .replace(/-(\d{5})(\d{0,1})/, "-$1-$2");
        } else {
            // Limita ao máximo de 13 caracteres
            isbnInput.value = valor.slice(0, 13);
        }
    });

    document.getElementById("clienteForm").addEventListener("submit", validarFormulario);
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

function validarIsbn () {
    // Está errada a validação do código isbn
    const isbn = document.getElementById("isbn").value.trim();
    const erro = document.getElementById("erroIsbn");
    if (isbn === "") {
        erro.textContent = "O ISBN é obrigatório";
        return false;
    } else if (isbn.length != 17) {
        erro.textContent = "ISBN deve-ser X-XXX-XXXXX-X ou XXX-X-XXX-XXXXX-X";
        return false;
    } else if (isbn.length != 13) {
        erro.textContent = "ISBN deve-ser X-XXX-XXXXX-X ou XXX-X-XXX-XXXXX-X";
        return false;
    }

    erro.textContent = ""; // Limpa o erro
    return true;
}

function validarDataLancamento () {
    const dataValida = document.getElementById("data").value;
    const data = new Date(document.getElementById("data").value);
    const erro = document.getElementById("erroDataNascimento");

    if (!dataValida) {
        erro.textContent = "A data de lançameto é obrigatória.";
        return false;
    } else if (data > Date.now) {
        erro.textContent = "A data de lançamento maior que a data atual";
        return false;
    }

    erro.textContent = ""; // Limpa o erro
    return true;
}

function validarPreco() {
    const preco = document.getElementById("preco").value;
    const erro = document.getElementById("erroPreco").value;

    if (preco === "") {
        erro.textContent = "O preço do livro é obrigatório";
        return false;
    } else if (preco < 1) {
        erro.textContent = "O livro deve custar pelo menos acima de R$1.00";
        return false;
    }

    erro.textContent = "";
    return true;
}

function validarDescricao() {
    const descricao = document.getElementById("descricao").value;
    const erro = document.getElementById("erroDescricao").value;

    if (descricao === "") {
        erro.textContent = "A descrição do livro é obrigatória";
        return false;
    } else if (descricao < 10) {
        erro.textContent = "A descrição do livro deve ter pelo menos 10 caracteres";
        return false;
    }

    erro.textContent = "";
    return true;
}

// Valida o Formulário Completo
function validarFormulario(event) {
    const nomeValido = validarNome();
    const isbnValido = validarIsbn();
    const dataLancamentoValida = validarDataLancamento();
    const validarPreco = validarPreco();
    const descricaoLivro = validarDescricao();
    if (!nomeValido || !isbnValido || !dataLancamentoValida || !validarPreco || !descricaoLivro) {
        event.preventDefault(); // Impede o envio do formulário
        const modal = new bootstrap.Modal(
            document.getElementById("exampleModal")
        );
        modal.show();
    }
}