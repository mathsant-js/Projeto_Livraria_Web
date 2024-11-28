// Adiciona eventos aos campos
document.addEventListener("DOMContentLoaded", function () {
    const campoNome = document.getElementById("nome");
    const campoNacionalidade = document.getElementById("nacionalidade");
    document.getElementById("nome").addEventListener("blur", validarNome);
    document.getElementById("nome").addEventListener("input", validarNome);
    document.getElementById("datanasc").addEventListener("blur", validarDataNascimento);
    document.getElementById("datanasc").addEventListener("input", validarDataNascimento);
    document.getElementById("datafale").addEventListener("blur", validarDataFalecimento);
    document.getElementById("datafale").addEventListener("input", validarDataFalecimento);
    document.getElementById("nacionalidade").addEventListener("blur", validarNacionalidade);
    document.getElementById("nacionalidade").addEventListener("input", validarNacionalidade);
    document.getElementById("biografia").addEventListener("blur", validarBiografia);
    document.getElementById("biografia").addEventListener("input", validarBiografia);
    document.getElementById("autorForm").addEventListener("submit", validarFormulario);
    campoNome.addEventListener("input", function(event) {
        const campo = event.target;
        campo.value = campo.value.replace(/[^a-zA-Zà-úÀ-Ú\s]/g, "");
    })
    campoNacionalidade.addEventListener("input", function(event) {
        const campo = event.target;
        campo.value = campo.value.replace(/[^a-zA-Zà-úÀ-Ú\s]/g, "");
    })
    
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

// Valida a Data de Nascimento
function validarDataNascimento() {
    const data = document.getElementById("datanasc").value;
    const erro = document.getElementById("erroDataNascimento");

    if (!data) {
        erro.textContent = "A data de nascimento é obrigatória.";
        return false;
    }

    erro.textContent = ""; // Limpa o erro
    return true;
}

// Valida a Data de Falecimento
function validarDataFalecimento() {
    const dataNasc = new Date(document.getElementById("datanasc").value);
    const dataFale = new Date(document.getElementById("datafale").value);
    const erro = document.getElementById("erroDataFalecimento");

    if (document.getElementById("datafale").value && dataFale <= dataNasc) {
        erro.textContent = "A data de falecimento deve ser maior que a de nascimento.";
        return false;
    }

    erro.textContent = ""; // Limpa o erro
    return true;
}

// Valida a Nacionalidade
function validarNacionalidade() {
    const nacionalidade = document.getElementById("nacionalidade").value.trim();
    const erro = document.getElementById("erroNacionalidade");

    if (nacionalidade === "") {
        erro.textContent = "A nacionalidade é obrigatória.";
        return false;
    }

    erro.textContent = ""; // Limpa o erro
    return true;
}

// Valida a Biografia
function validarBiografia() {
    const biografia = document.getElementById("biografia").value.trim();
    const erro = document.getElementById("erroBiografia");

    if (biografia === "") {
        erro.textContent = "A biografia é obrigatória.";
        return false;
    } else if (biografia.length < 10) {
        erro.textContent = "A biografia deve ter mais de 10 caracteres.";
        return false;
    }

    erro.textContent = ""; // Limpa o erro
    return true;
}

// Valida o Formulário Completo
function validarFormulario(event) {
    const nomeValido = validarNome();
    const dataNascValida = validarDataNascimento();
    const dataFaleValida = validarDataFalecimento();
    const nacionalidadeValida = validarNacionalidade();
    const biografiaValida = validarBiografia();

    if (!nomeValido || !dataNascValida || !dataFaleValida || !nacionalidadeValida || !biografiaValida) {
        event.preventDefault(); // Impede o envio do formulário
        const modal = new bootstrap.Modal(
            document.getElementById("exampleModal")
        );
        modal.show();
    }
}