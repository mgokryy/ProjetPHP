<?php
include_once 'bdd.php';

class UsersModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = Bdd::connexion();
    }
    public function inscription($username, $password)
    {
        $stmt = $this->bdd->prepare("INSERT INTO users (username, password, score, created_at) VALUES(?, ?, 0, NOW())");
        return $stmt->execute([$username, $password]);
    }

    public function getUserByUsername($username)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
