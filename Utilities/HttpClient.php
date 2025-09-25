<?php

require_once __DIR__ . '/../Exceptions/ParametroInvalidoException.php';
require_once __DIR__ . '/../Exceptions/HttpClientException.php';

class HttpClient
{
    public function get(string $url): array
    {
        if (empty($url)) {
            throw new ParametroInvalidoException('url');
        }

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        if ($response == false) {
            throw new HttpClientException('GET', $url);
        }

        return json_decode($response, true, flags: JSON_THROW_ON_ERROR);
    }

    public function post(string $url, array $data): array
    {
        if (empty($url)) {
            throw new ParametroInvalidoException('url');
        }

        $ch = curl_init($url);

        // Define como POST
        curl_setopt($ch, CURLOPT_POST, true);

        if (isset($data)) {
            // Envia os dados como JSON
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            // Cabeçalhos da requisição
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Content-Type: application/json"
            ]);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        if ($response == false) {
            throw new HttpClientException('POST', $url);
        }

        return json_decode($response, true);
    }
}
