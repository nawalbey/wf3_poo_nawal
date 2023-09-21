<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/wf3_poo_nawal/models/database.php";

class Player
{
    public static function addPlayer($email, $nickname, )
    {

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request = $db->prepare("INSERT INTO `player`(`email`, `nickname`) VALUES(?,?)");

        // exécuter la requête
        try {
            $request->execute(array($email, $nickname));

            // rediriger vers la page login.php
            header("Location: http://localhost/wf3_poo_nawal/views/list_player.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    public static function listPlayer()
    {

        $db = Database::dbConnect();
        //preparer la requete
        $request = $db->prepare("SELECT * FROM player");
        //executer la requete
        try {
            $request->execute();
            //recuperer le resultat dans un tableau 
            $player = $request->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $player;

    }
}