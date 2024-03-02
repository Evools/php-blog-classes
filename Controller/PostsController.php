<?php

class PostsController
{
    public $title;
    public $description;
    public $image;
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addPost($title, $description, $image)
    {
        $db = "CREATE TABLE IF NOT EXISTS `posts` (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(70) NOT NULL,
            description TEXT NOT NULL,
            image VARCHAR(255) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
        $this->conn->exec($db);

        $sql = "INSERT INTO `posts` (`title`, `description`, `image`) VALUES (:title, :description, :image)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        $stmt->execute();
    }

    public function getAllPost()
    {
        $sql = "SELECT * FROM `posts`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getPost($id)
    {
        $slq = "SELECT * FROM `posts` WHERE id = :id";
        $stmt = $this->conn->prepare($slq);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function deletePost($id)
    {
        $sql = "DELETE FROM `posts` WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}