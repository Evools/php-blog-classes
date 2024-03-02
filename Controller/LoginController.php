<?php

class LoginController
{
    public $email;
    public $password;

    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function login_user($email, $password)
    {
        $query = "SELECT * FROM `users` WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['auth'] = true;
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];
                return array("success" => true);
            } else {
                $err_message = "Неверный логин или пароль";
                return array("success" => false, "message" => $err_message);
            }
        } else {
            $err_message = "Пользователь с таким E-mail не найден";
            return array("success" => false, "message" => $err_message);
        }
    }
}