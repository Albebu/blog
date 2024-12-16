<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../controllers/UserController.php';

use config\Database;
use models\User;
use controllers\UserController;

$db = (new Database())->getConnection();

$user = new User($db);
$userController = new UserController($user);

$username = $_POST['username'];
$password = $_POST['password'];

$userController->handleLogin($username, $password);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
