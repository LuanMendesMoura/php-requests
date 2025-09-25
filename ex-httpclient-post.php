<?php

require_once __DIR__ . '/Utilities/HttpClient.php';

$httpClient = new HttpClient();

$data = [
    "title" => "Aula PHP API",
    "body" => "Aprendendo a consumir API com PHP vanilla!",
    "userId" => 1
];
$post = $httpClient->post('https://jsonplaceholder.typicode.com/posts', $data);

echo "ID: {$post['id']}<br>";
echo "Título: {$post['title']}<br>";
echo "Conteúdo: {$post['body']}<hr>";