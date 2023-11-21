<?php

abstract class Model {
    private static $pdo;

    private static function setBdd() {
        try {
            self::$pdo = new PDO("mysql:host=localhost;dbname=bd;charset=utf8mb4", "root", "root");
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Gérer l'erreur de connexion (enregistrement dans les journaux, affichage d'un message d'erreur, etc.)
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    protected function getBdd() {
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}
