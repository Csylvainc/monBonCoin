<?php

namespace App;

use PDO;
use PDOException;

class Db{
    private static $db;

    static function getDb(){
        if(!self::$db){
            try{
                $config = file_get_contents('../App/config.json');
                $config = json_decode($config);
                self::$db = new PDO("mysql:host=" . $config->host . ";dbname=" . $config->dbName, $config->user, $config->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            }catch(PDOException $e){
                echo 'erreur : ' . $e->getMessage();
            }
        }
        return self::$db;
    }
}

// Pour tester l'acce au fichier json
// $config = file_get_contents('../App/config.json');
// $config = json_decode($config);
// var_dump($config);

// echo $config->dbName;

// Pour tester la connexion

// $testBdd = new Db;
// var_dump($testBdd);
// var_dump(get_class_methods($testBdd));

// var_dump($testBdd::getDb());