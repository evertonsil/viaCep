<?php

class ViaCep
{
    public function getAddress($cep)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://viacep.com.br/ws/{$cep}/json/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //passar pela verificação do SSL para testes
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $response = curl_exec($ch);

        if ($response === false) {
            $error = curl_error($ch);
            echo "Erro na requisição cURL: $error";
            curl_close($ch);
            exit;
        }

        curl_close($ch);
        $data = json_decode($response, true);

        return $data;
    }

}

