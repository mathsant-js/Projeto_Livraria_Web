// Adiciona eventos aos campos
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("nome").addEventListener("blur", validarNome);
    document.getElementById("nome").addEventListener("input", validarNome);
    document.getElementById("cpf").addEventListener("input", validarCpf);
    document.getElementById("cpf").addEventListener("blur", validarCpf);
    document.getElementById("datanasc").addEventListener("input", validarDataNascimento);
    document.getElementById("datanasc").addEventListener("blur", validarDataNascimento);
    document.getElementById("telefone").addEventListener("input", validarTelefone);
    document.getElementById("telefone").addEventListener("blur", validarTelefone);
    document.getElementById("email").addEventListener("input", validarEmail);
    document.getElementById("email").addEventListener("blur", validarEmail);
    document.getElementById("endereco").addEventListener("input", validarEndereco);
    document.getElementById("endereco").addEventListener("blur", validarEndereco);
    document.getElementById("senha").addEventListener("input", validarSenha);
    document.getElementById("senha").addEventListener("blur", validarSenha);
    const telefoneInput = document.querySelector("#telefone");
    const cpfInput = document.querySelector("#cpf");

    cpfInput.addEventListener("input", function () {
        let valor = cpfInput.value.replace(/\D/g, ""); // Remove caracteres não numéricos

        // Formata o valor conforme o comprimento
        if (valor.length <= 3) {
            cpfInput.value = valor;
        } else if (valor.length <= 6) {
            cpfInput.value = valor.slice(0, 3) + "." + valor.slice(3);
        } else if (valor.length <= 9) {
            cpfInput.value = valor.slice(0, 3) + "." + valor.slice(3, 6) + "." + valor.slice(6);
        } else {
            cpfInput.value = valor.slice(0, 3) + "." + valor.slice(3, 6) + "." + valor.slice(6, 9) + "-" + valor.slice(9, 11);
        }
    });

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

function validarCpf () {
    const cpf = document.getElementById("cpf").value.trim();
    const erro = document.getElementById("erroCpf");
    if (cpf === "") {
        erro.textContent = "O CPF é obrigatório";
        return false;
    } else if (cpf.length < 14) {
        erro.textContent = "CPF incompleto";
        return false;
    }

    erro.textContent = ""; // Limpa o erro
    return true;
}

function validarDataNascimento () {
    const dataValida = document.getElementById("datanasc").value;
    const data = new Date(document.getElementById("datanasc").value);
    const erro = document.getElementById("erroDataNascimento");

    if (!dataValida) {
        erro.textContent = "A data de nascimento é obrigatória.";
        return false;
    } else if (data > Date.now) {
        erro.textContent = "A data de nascimento maior que a data atual";
        return false;
    }

    erro.textContent = ""; // Limpa o erro
    return true;
}

function validarEmail () {
    const email = document.getElementById("email").value.trim();
    const erro = document.getElementById("erroEmail");
    if (email === "") {
        erro.textContent = "O email é obrigatório";
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

function validarSenha () {
    const senha = document.getElementById("senha").value.trim();
    const erro = document.getElementById("erroSenha");
    if (senha === "") {
        erro.textContent = "A senha é obrigatória";
        return false;
    } else if (senha.length < 3) {
        erro.textContent = "A senha deve ter no mínimo 3 caracteres";
        return false;
    }

    erro.textContent = "";
    return true;
}

// Valida o Formulário Completo
function validarFormulario(event) {
    const nomeValido = validarNome();
    const cpfValido = validarCpf();
    const dataNascimentoValida = validarDataNascimento();
    const emailValido = validarEmail();
    const telefoneValido = validarTelefone();
    const enderecoValido = validarEndereco();
    const senhaValida = validarSenha();

    if (!nomeValido || !cpfValido || !dataNascimentoValida || !emailValido || !telefoneValido || !enderecoValido || !senhaValida) {
        event.preventDefault(); // Impede o envio do formulário
        const modal = new bootstrap.Modal(
            document.getElementById("exampleModal")
        );
        modal.show();
    }
}