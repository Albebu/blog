<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: ../errors/need-login.php');
    exit;
}

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../controllers/UserController.php';

use config\Database;
use models\Post;
use controllers\PostController;

$database = new Database();
$db = $database->getConnection();

$postController = new PostController($db);
$posts = json_decode($postController->handleRead(), true);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="background-color: lightblue; width: 300px; height: 300px;">
        Post 1
    </div>
    <?php foreach ($posts as $post) {
        echo '<div style="background-color: lightblue; width: 300px; height: 300px; margin-bottom: 10px;">';
        echo '<h2>' . htmlspecialchars($post['title']) . '</h2>';
        echo '<p>' . htmlspecialchars($post['content']) . '</p>';
        echo '</div>';
    }?>
</body>
</html>