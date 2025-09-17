<?php
require_once __DIR__ . "/Utilities/HttpClient.php";

$httpClient = new HttpClient();

$posts = $httpClient->get('https://jsonplaceholder.typicode.com/posts');

$usuarios = $httpClient->get('https://jsonplaceholder.typicode.com/users');

$usuariosPorId = [];
foreach ($usuarios as $usuario) {
    $usuariosPorId[$usuario['id']] = $usuario['name'];
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Posts</title>
</head>

<body>
    <?php foreach ($posts as $post): ?>
        <form action="ex-post-usuario.php" method="POST">
            <article>
                <input type="hidden" name="userId" value="<?= $post['userId']?>">
                <input type="hidden" name="name" value="<?= $usuariosPorId[$post['userId']]?>">
                <h2><?= $post['title'] ?></h2>
                <p><?= $post['body'] ?></p>
                <button>
                    <p><strong>Usuário:</strong> <?= $usuariosPorId[$post['userId']] ?></p>
                </button>
            </article>
        </form>
    <?php endforeach; ?>

</body>

</html>