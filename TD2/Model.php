<?php

require_once 'Conf.php';

class Model {

    private static ?Model $instance = null;
    private PDO $pdo;

    public function __construct() {

        $hostname = Conf::getHostname();
        $database = Conf::getDatabase();
        $login    = Conf::getLogin();
        $password = Conf::getPassword();

        $this->pdo = new PDO("mysql:host=$hostname;
                                  dbname=$database",
                                  $login,
                                  $password,
                                  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getPdo(): PDO {

        return static::getInstance()->pdo;
    }

    // getInstance s'assure que le constructeur ne sera appelé qu'une seule fois.
    // L'unique instance crée est stockée dans l'attribut $instance
    private static function getInstance() : Model {
        // L'attribut statique $pdo s'obtient avec la syntaxe static::$pdo
        // au lieu de $this->pdo pour un attribut non statique
        if (is_null(static::$instance)) static::$instance = new Model();

        return static::$instance;
    }

}