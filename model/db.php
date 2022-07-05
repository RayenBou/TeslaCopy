<?php
class DB
{

    public function connexion()
    {
        // Paramètres de connexion
        // For windows xampp :


        $hostBdd = "localhost:3306"; // Mac: 8889, Win: 3306
        $userBdd = "root";
        $passwordUserBdd = ""; // Mac: "root", Win: ""
        $dbName = "clothesshop";

        // // For mac :
        // $hostBdd = "localhost:8889"; // Mac: 8889, Win: 3306
        // $userBdd = "root";
        // $passwordUserBdd = "root"; // Mac: "root", Win: ""
        // $dbName = "clothesshop";

        try {

            // Connexion à la bdd
            $connexion = new PDO("mysql:host=" . $hostBdd . ";dbname=" . $dbName . ";charset=utf8", $userBdd, $passwordUserBdd);

        } catch (PDOException $erreur) {

            // Affichage du message d'erreur
            echo "Erreur: " . $erreur->getMessage();
        }

        return $connexion;
    }
}