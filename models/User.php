<?php

require_once __DIR__ . '/BaseModel.php';

class User extends BaseModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function attemptLogin(string $email, string $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email";

        $statement = $this->dbConnection->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();

        $user = $statement->fetch();

        if (!$user) {
            return false;
        }

        if (password_verify($password, $user['password'])) {
            return true;
        }

        return false;
    }
}
