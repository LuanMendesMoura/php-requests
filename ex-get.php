<?php
// URL da API (lista de posts fake)
$url = "https://jsonplaceholder.typicode.com/posts";

// Inicializa cURL
$ch = curl_init($url);

// Define que queremos a resposta como string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Executa a requisição
$response = curl_exec($ch);

// Fecha a conexão
curl_close($ch);

// Converte a resposta JSON em array associativo
$data = json_decode($response, true);

// Exibe apenas os 3 primeiros posts
foreach (array_slice($data, 0, 3) as $post) {
    echo "ID: {$post['id']}<br>";
    echo "Título: {$post['title']}<br>";
    echo "Conteúdo: {$post['body']}<hr>";
}
