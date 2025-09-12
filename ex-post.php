<?php
$url = "https://jsonplaceholder.typicode.com/posts";

// Dados a serem enviados
$postData = [
    "title" => "Aula PHP API",
    "body" => "Aprendendo a consumir API com PHP vanilla!",
    "userId" => 1
];

// Inicializa cURL
$ch = curl_init($url);

// Define como POST
curl_setopt($ch, CURLOPT_POST, true);

// Envia os dados como JSON
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

// Cabeçalhos da requisição
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);

// Receber resposta
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Executa requisição
$response = curl_exec($ch);
curl_close($ch);

// Exibe resposta formatada
$result = json_decode($response, true);

echo "ID: {$result['id']}<br>";
echo "Título: {$result['title']}<br>";
echo "Conteúdo: {$result['body']}<hr>";