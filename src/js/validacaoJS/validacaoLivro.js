// Adiciona eventos aos campos
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("nome").addEventListener("blur", validarNome);
    document.getElementById("nome").addEventListener("input", validarNome);
    document.getElementById("isbn").addEventListener("blur", validarIsbn);
    document.getElementById("isbn").addEventListener("input", validarIsbn);
    document.getElementById("data").addEventListener("input", validarDataLancamento);
    document.getElementById("data").addEventListener("blur", validarDataLancamento);
    document.getElementById("preco").addEventListener("input", validarPreco);
    document.getElementById("preco").addEventListener("blur", validarPreco);
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

    document.getElementById("livroForm").addEventListener("submit", validarFormulario);
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
    // Está errada a validação do código isbn
    const isbn = document.getElementById("isbn").value.trim();
    const erro = document.getElementById("erroIsbn");
    if (isbn === "") {
        erro.textContent = "O ISBN é obrigatório";
        return false;
    } else if (isbn.length != 12 && isbn.length != 13) {
        console.log(isbn.length);
        erro.textContent = "ISBN deve-ser X-XXX-XXXXX-X ou XXX-X-XXX-XXXXX-X";
        return false;
    } else if (isbn.length != 17) {
        console.log(isbn.length);
        erro.textContent = "ISBN deve-ser X-XXX-XXXXX-X ou XXX-X-XXX-XXXXX-X";
        return false;
    }
    erro.textContent = ""; // Limpa o erro
    return true;

}

function validarDataLancamento() {
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