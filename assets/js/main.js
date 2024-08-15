$(document).ready(function () {
    //chama uma função no evento change do input de cep, enviando via ajax para o processamento em php
    $('#cep').change(function () {
        let cep = $('#cep').val();
        if (cep.length < 9) {
            alert('CEP Inválido');
        }
        else {
            $.ajax({
                method: "POST",
                url: "buscaCep.php",
                data: { cep: cep },
                success: function (result) {
                    //trasnformando array em objeto
                    result = JSON.parse(result);

                    //recebendo os dados e adicionando nos campos de endereço
                    $('#endereco').val(result.localidade);
                    $('#bairro').val(result.bairro);
                    $('#cidade').val(result.localidade);
                    $('#uf').val(result.uf);
                    $('#numero').focus();
                },
                error: function (textStatus, errorThrown) {
                    console.error('Erro na requisição Ajax: ', textStatus, errorThrown);
                }
            })

        }
    });
});


