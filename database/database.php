<?php

/**
 * Classe de type singleton permettant de générer un objet DBo unique pour l'application
 *
 * @Author : Guy Verghote
 * @Version : 2    Connexion local ou sur serveur
 */

class Database
{
    private static $_instance; // stocke l'adresse de l'unique objet instanciable

    /**
     * La méthode statique qui permet d'instancier ou de récupérer l'instance unique
     **/
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {

            if ($_SERVER['SERVER_NAME'] === 'ppe') {
                $config = require('configlocale.php');
            } else {
                $config = require('configdistante.php');
            }
            $dbHost = $config['host'];
            $dbBase = $config ['database'];
            $dbUser = $config['user'];
            $dbPassword = $config['password'];
            try {
                $chaine = "mysql:host=$dbHost;dbname=$dbBase";
                $db = new PDO($chaine, $dbUser, $dbPassword);
                $db->exec("SET NAMES 'utf8'");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$_instance = $db;
            } catch (PDOException $e) { // à personnaliser
                echo "Accès à la base de données impossible, vérifiez les paramètres de connexion : " . $e->getMessage();
                exit();
            }
        }
        return self::$_instance;
    }
}