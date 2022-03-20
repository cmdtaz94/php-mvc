<?php

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/User.php';

class AuthController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLoginForm()
    {
        $title = 'Connexion';
        require __DIR__ . '/../views/login.php';
    }

    public function postLoginForm()
    {
        $user = new User();

        if ($user->attemptLogin($_POST['email'], $_POST['password'])) {
            require __DIR__ . '/../views/dashboard.php';
        } else {
            createFlashMessage('Email ou mot de passe erroné', FLASH_ERROR);
            require __DIR__ . '/../views/login.php';
        }
    }
}
