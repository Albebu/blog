<?php

require_once __DIR__ . '../config/Database.php';
require_once __DIR__ . '../models/User.php';
require_once __DIR__ . '../controllers/UserController.php';

use config\Database;
use models\User;
use controllers\UserController;

$db = (new Database())->getConnection();

$user = new User($db);
$userController = new UserController($user);

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$userController->handleRegistration($username, $email, $password);

?>
<html lang="ee">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="/utils/register.php" method="post">
        <label for="username">Nombre de usuario: </label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email: </label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña: </label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>