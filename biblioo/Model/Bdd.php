<?php 

namespace Model;
use PDO;    // Solutionne le confit Model\PDO
use Model\Entities\BaseEntities;

abstract class Bdd{

    /* On ne peut pas mettre un objet dans une constante
    public static const PDO = new PDO('mysql:host=localhost;dbname=biblioo', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);*/
    /**
     * Cette méthode effectue une connexion à la BDD
     */
    public static function getDatabase(){
        return new PDO('mysql:host=localhost;dbname=biblioo', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
    }

    public static function liste($table) {
        $r = self::getDatabase()->query("SELECT * FROM $table");
        return $r->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function selectById($table, $id){
        $r = self::getDatabase()->query(" SELECT * FROM $table WHERE id = $id ");
        if ( $r->rowCount() == 1 ){
            $classe = "Model\Entities\\" . ucfirst($table);
            $r->setFetchMode(PDO::FETCH_CLASS, $classe);
            return $r->fetch();
        }
    }

    public static function enregistre(BaseEntities $enregistrement){
        $table = (string)$enregistrement;
        $champs = "";
        $valeurs = "";

        if( $enregistrement->getId() ){
            $texteRequete = "UPDATE $table SET ";
            foreach($enregistrement->proprietes() as $propriete => $valeur){
                $champs .= ($champs ? ", " : "") . "$propriete = :$propriete";
            }
            $texteRequete .= $champs . " WHERE id = :id";
        } else {
            $texteRequete = "INSERT INTO $table (";
            foreach($enregistrement->proprietes() as $propriete => $valeur){
                if($propriete != "id"){
                    $champs  .= ($champs  ? ", " : "") . $propriete;
                    $valeurs .= ($valeurs ? ", " : "") . ":" . $propriete;
                }
            }
            $texteRequete .= $champs . ") VALUES (" . $valeurs . ")";
        }
        $pdo = self::getDatabase();
        $r = $pdo->prepare($texteRequete);

        foreach($enregistrement->proprietes() as $propriete => $valeur){
            if($propriete != "id"){
                $r->bindValue(":$propriete", $valeur);
            }
        }
        if( $enregistrement->getId() ){
            $r->bindValue(":id", $enregistrement->getId());
        }

        return $r->execute();
    }
}