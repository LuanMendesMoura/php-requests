<?php

require_once __DIR__ . '/Utilities/HttpClient.php';

$httpClient = new HttpClient();

$data = $httpClient->get('https://jsonplaceholder.typicode.com/posts');

foreach ($data as $post) {
    echo "ID: {$post['id']}<br>";
    echo "Título: {$post['title']}<br>";
    echo "Conteúdo: {$post['body']}<hr>";
}