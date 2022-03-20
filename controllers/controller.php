<?php

require_once __DIR__ . '/../models/User.php';

function login()
{
    $title = 'Connexion';
    require __DIR__ . '/../views/login.php';
}

function postLogin()
{
    $user = new User();

    if ($user->attemptLogin($_POST['email'], $_POST['password'])) {
        require __DIR__ . '/../views/dashboard.php';
    } else {
        createFlashMessage('Email ou mot de passe erroné', FLASH_ERROR);
        require __DIR__ . '/../views/login.php';
    }
}
