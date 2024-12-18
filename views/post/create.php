<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
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
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
    <h1>Create Post</h1>
    <form method="post" action="create.php">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>

        <label for="body">Comment:</label>
        <input type="text" name="body" required><br>

        <button type="submit">Create</button>
    </form>
</body>
</html>
