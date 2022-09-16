<?php
class Conf {

    static private array $databases = array(

        'hostname' => 'riosq',
        'database' => 'riosq',
        'login' => 'riosq',
        'password' => 'saucisse'
    );

    static public function getLogin() : string {
        // L'attribut statique $databases s'obtient avec la syntaxe static::$databases
        // au lieu de $this->databases pour un attribut non statique
        return static::$databases['login'];
    }

    /**
     * @return array|string[]
     */
    public static function getDatabases(): array
    {
        return self::$databases;
    }


}
?>

