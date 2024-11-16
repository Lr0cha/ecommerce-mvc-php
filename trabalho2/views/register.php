<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>Cadastro</title>
</head>
<body>

<div class="container">
    <div class="client-register">
        <h1 class="title-forms">Cadastro de usuário</h1>
        <form method="POST" action="index.php?action=register">
            <div class="form-register">
                <div class="text-field">
                    <label for="text_name">Nome*</label>
                    <input type="text" id="text_name" name="name" required>
                </div>
                <div class="text-field">
                    <label for="text_email">E-mail*</label>
                    <input type="email" id="text_email" name="email" required>
                </div>
                <div class="text-field">
                    <label for="text_cpf">CPF*</label>
                    <input type="text" id="text_cpf" name="cpf" required>
                </div>
                <div class="text-field">
                    <label for="text_password">Senha*</label>
                    <input type="password" id="text_password" name="password" required>
                </div>
                <div class="text-field">
                    <label for="text_phone">Telefone*</label>
                    <input type="text" id="text_phone" name="phone" required>
                </div>
                <div class="text-field">
                    <label for="text_birthday">Nascimento*</label>
                    <input type="date" id="text_birthday" name="birth" required>
                </div>
                <div class="text-field">
                    <label for="text_cep">CEP*</label>
                    <input type="text" id="text_cep" name="cep" maxlength="9" onblur="consultarCep()" required>
                </div>
                <div class="text-field">
                    <label for="text_address">Endereço*</label>
                    <input type="text" id="text_address" name="address" required>
                </div>
                <div class="btn-forms">
                    <input type="submit" value="Cadastrar">
                </div>
            </div>
            <div class="link-register">
                <a href="index.php?action=login">Já tem uma conta? Entre aqui</a>
            </div>
        </form>

        <?php
            if (isset($_SESSION['error_message'])) {
                echo "<script type='text/javascript'>
                        alert('" . addslashes($_SESSION['error_message']) . "');
                        </script>";
                unset($_SESSION['error_message']);
            }
        ?>
    </div>
</div>
<script>
    // Função para consultar o CEP e preencher o input endereço automaticamente
    function consultarCep() {
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
        }
    }
</script>
</body>
</html>
