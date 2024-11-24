function checkCep() {
    var cep = document.getElementById("text_cep").value.replace(/\D/g, ''); // Remove caracteres não numérico p/ consulta
    if (cep.length === 8) {
        var url = `https://viacep.com.br/ws/${cep}/json/`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.erro) {
                    alert('CEP não encontrado.');
                } else {
                    // Preenche os campos do input com o end.
                    document.getElementById("text_address").value = `${data.logradouro}, ${data.bairro}, ${data.localidade} - ${data.uf}`;
                }
            })
            .catch(error => alert('Erro ao consultar o CEP.'));
    } else {
        alert('CEP inválido.');
        return
    }
}

function cpfMask(i){
    var v = i.value;
    
    if(isNaN(v[v.length-1])){ // impede caractere que não seja num
        i.value = v.substring(0, v.length-1);
        return;
    }
    
    i.setAttribute("maxlength", "14");
    if (v.length == 3 || v.length == 7) i.value += ".";
    if (v.length == 11) i.value += "-";
}

// evento mascara do telefone
const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
  }
  
  const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{2})(\d)/,"($1) $2")
    value = value.replace(/(\d)(\d{4})$/,"$1-$2")
    return value
  }

  document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    clearErrorMessages();

    if (!validateCpf() || !validatePasswordField() || !validatePhone() || !validateBirthDate()) {
        return;
    }

   
    this.submit(); // envio caso esteja tudo correto
});

// Validação do CPF
function validateCpf() {
    const cpf = document.getElementById("text_cpf").value.replace(/\D/g, ''); // remove NaN
    if (cpf.length !== 11) {
        showErrorMessage("error_cpf", "CPF inválido.");
        return false;
    }
    return true;
}

function validatePasswordField() {
    const password = document.getElementById("text_password").value;
    if (password.length < 6) {
        showErrorMessage("error_password", "A senha deve ter pelo menos 6 caracteres.");
        return false;
    }
    return true;
}

function validatePhone() {
    const phone = document.getElementById("text_phone").value;
    const phoneClean = phone.replace(/\D/g, ''); // remove NaN

    if (phoneClean.length !== 11) {
        showErrorMessage("error_phone", "Número de celular inválido.");
        return false;
    }

    return true;
}

function validateBirthDate() {
    const birth = document.getElementById("text_birthday").value;
    if (!birth) {
        showErrorMessage("error_birthday", "Data de nascimento é obrigatória.");
        return false;
    }
    const birthDate = new Date(birth);
    const currentDate = new Date();
    if (birthDate >= currentDate) {
        showErrorMessage("error_birthday", "Data de nascimento inválida.");
        return false;
    }
    return true;
}

// exibir a mensagem de erro
function showErrorMessage(elementId, message) {
    const errorElement = document.getElementById(elementId);
    errorElement.style.display = 'block';
    errorElement.textContent = message;
}

// limpar as mensagens de erro
function clearErrorMessages() {
    const errorElements = document.querySelectorAll('.error-message');
    errorElements.forEach(element => {
        element.style.display = 'none';
        element.textContent = '';
    });
}

