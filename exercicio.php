<?php
require_once __DIR__ . "/Utilities/HttpClient.php";

$httpClient = new HttpClient();

$conteudoBody = $httpClient->get('https://jsonplaceholder.typicode.com/posts');

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Post</title>
</head>

<body>
    <?php foreach ($conteudoBody as $post): ?>
        <form action="">
            <article>
                <h2><?= $post['title']?></h2>
                <p><?= $post['body'] ?></p>
                <button>
                    <p><strong>Usuário:</strong> Luan Moura</p>
                </button>
            </article>
        </form>
    <?php endforeach; ?>

</body>

</html>