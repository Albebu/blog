<?php

namespace controllers;

use models\User;

class UserController {
    private $userModel;

    public function __construct(User $user) {
        $this->userModel = $user;
    }

    public function handleRegistration($username, $email, $password) {
        $this->userModel->username = $username;
        $this->userModel->email = $email;
        $this->userModel->password = $password;

        if($this->userModel->register()) {
            echo "Registro exitoso";
        } else {
            echo "Error en el registro";
        }
    }

    public function handleLogin($username, $password) {
        $this->userModel->username = $username;
        $this->userModel->password = $password;

        if ($this->userModel->login()) {
            session_start();
            $_SESSION['user_id'] = $this->userModel->id;
            $_SESSION['username'] = $this->userModel->username;

            echo "Inicio de sesión exitoso";
        } else {
            echo "Nombre de usuario o contraseña incorrectos";
        }
    }
}