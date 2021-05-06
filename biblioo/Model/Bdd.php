<?php 

namespace Model;
use PDO;    // Solutionne le confit Model\PDO

abstract class Bdd{

    public static function listeLivres(){

        // Appel à la BDD pour avoir la liste des livres
        $pdo = new PDO('mysql:host=localhost;dbname=biblioo', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
    
        $pdostatement = $pdo->query("SELECT * FROM livre");
        return $pdostatement->fetchAll(PDO::FETCH_ASSOC);
    }

    // abstract public function abstraite();
}