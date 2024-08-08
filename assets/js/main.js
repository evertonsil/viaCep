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
                data: { cep: cep }
            })
        }
    });
});


