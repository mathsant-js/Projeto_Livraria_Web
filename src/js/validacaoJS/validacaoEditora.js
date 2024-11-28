// Adiciona eventos aos campos
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("nome").addEventListener("blur", validarNome);
    document.getElementById("nome").addEventListener("input", validarNome);
    document.getElementById("telefone").addEventListener("input", validarTelefone);
    document.getElementById("telefone").addEventListener("blur", validarTelefone);
    document.getElementById("endereco").addEventListener("input", validarEndereco);
    document.getElementById("endereco").addEventListener("blur", validarEndereco);
    const telefoneInput = document.querySelector("#telefone");

    telefoneInput.addEventListener("input", function () {
        let valor = telefoneInput.value.replace(/\D/g, ""); // Remove caracteres não numéricos
        let formatado = "";

        if (valor.length > 0) {
            formatado += "(" + valor.slice(0, 2); // Código de área
        }
        if (valor.length > 2) {
            formatado += ") " + valor.slice(2, valor.length > 10 ? 7 : 6); // Até 4 ou 5 dígitos no prefixo
        }
        if (valor.length > 6) {
            formatado += "-" + valor.slice(valor.length > 10 ? 7 : 6); // Últimos 4 dígitos
        }

        telefoneInput.value = formatado;
    });
    document.getElementById("editoraForm").addEventListener("submit", validarFormulario);
});

// Valida o campo Nome
function validarNome() {
    const nome = document.getElementById("nome").value.trim();
    const erro = document.getElementById("erroNome");
    if (nome === "") {
        erro.textContent = "O nome é obrigatório.";
        return false;
    } else if (nome.length < 3) {
        erro.textContent = "O nome deve ter no mínimo 3 caracteres.";
        return false;
    }

    erro.textContent = ""; // Limpa o erro
    return true;
}

function validarTelefone () {
    const endereco = document.getElementById("telefone").value.trim();
    const erro = document.getElementById("erroTelefone");
    if (endereco === "") {
        erro.textContent = "O telefone é obrigatório";
        return false;
    } else if (endereco.length < 14 || endereco.length > 15) {
        erro.textContent = "O telefone deve ser (XX)XXXX-XXXX ou (XX)XXXXX-XXXX";
        return false;
    }

    erro.textContent = ""; // Limpa o erro
    return true;
}

function validarEndereco() {
    const endereco = document.getElementById("endereco").value.trim();
    const erro = document.getElementById("erroEndereco");
    if (endereco === "") {
        erro.textContent = "O endereço é obrigatório";
        return false;
    } else if (endereco.length < 10) {
        erro.textContent = "O endereço deve ter no minímo 10 caracteres";
        return false;
    }

    erro.textContent = ""; // Limpa o erro
    return true;
}

// Valida o Formulário Completo
function validarFormulario(event) {
    const nomeValido = validarNome();
    const telefoneValido = validarTelefone();
    const enderecoValido = validarEndereco();

    if (!nomeValido || !telefoneValido || !enderecoValido) {
        event.preventDefault(); // Impede o envio do formulário
        const modal = new bootstrap.Modal(
            document.getElementById("exampleModal")
        );
        modal.show();
    }
}