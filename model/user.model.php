<?php
include_once 'db.php';

class UserModel
{
    private $__db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function connexion($login, $password)
    {
        $connexion = $this->db->connexion();
        $result = $connexion->query("SELECT * FROM users WHERE username = '$login' AND password = '$password'");
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if ($user != false) {
            setcookie('user', $user['username']);
            setcookie('role', $user['role']);

        } else {
            $error = false;

            return $error;
        }

        return $user;
    }

}