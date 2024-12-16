<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../controllers/PostController.php';

use config\Database;
use models\Post;
use controllers\PostController;

$db = (new Database())->getConnection();

$post = new Post($db);
$postController = new PostController($user);

$title = $_POST['title'];
$body = $_POST['body'];

$postController->handlePostCreation($title, $body);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="main.php">
        <label for="username">Title:</label>
        <input type="text" name="title" required><br>

        <label for="password">Comment:</label>
        <input type="text" name="body" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
