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