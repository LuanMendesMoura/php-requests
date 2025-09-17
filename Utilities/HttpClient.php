<?php

class HttpClient
{

    public function get(string $url)
    {
        try {
            if(empty($url)){
                // print erro
            }

            // Inicializa cURL
            $handle = curl_init($url);

            // Define que queremos a resposta como string
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

            // Executa a requisição
            $retorno = curl_exec($handle);

            // Fechando a conexão
            curl_close($handle);

            // Converte a resposta JSON em array associativo
            return json_decode($retorno, true);
        } catch (Error $e) {
            echo $e->getMessage();
        }
    }

    public function post($url, $requestBody)
    {

        // Inicializa cURL
        $handle = curl_init($url);

        // Define como POST
        curl_setopt($handle, CURLOPT_POST, true);

        // Envia os dados como JSON
        curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($requestBody));

        // Cabeçalhos da requisição
        curl_setopt($handle, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json"
        ]);

        // Receber resposta
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

        // Executa requisição
        $response = curl_exec($handle);
        curl_close($handle);

        // Exibe resposta formatada
        return json_decode($response, true);
    }
}
