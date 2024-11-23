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
    }
}


