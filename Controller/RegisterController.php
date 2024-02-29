<?php

class RegisterController
{
    public $username;
    public $email;
    public $password;

    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function is_email_exists($email)
    {
        $query = "SELECT COUNT(*) FROM `users` WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

    public function register_user($username, $email, $password)
    {
        $db = "CREATE TABLE IF NOT EXISTS `users` (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(70) NOT NULL,
            email VARCHAR(50) UNIQUE,
            password VARCHAR(255) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
        $this->conn->exec($db);

        if ($this->is_email_exists($email)) {
            $err_message = "Пользователь с таким E-mail уже зарегестрирован";
            return array("success" => false, "message" => $err_message);
        }

        $query = "INSERT INTO users (`username`, `email`, `password`) VALUES (:username, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return array("success" => true);
    }

}