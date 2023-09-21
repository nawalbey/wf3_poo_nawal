<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/wf3_poo_nawal/models/database.php";

class Game
{
    public static function addGame($title, $min_players, $max_players)
    {

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request = $db->prepare("INSERT INTO `game`(`title`, `min_players`, `max_players`) VALUES(?,?,?)");

        // exécuter la requête
        try {
            $request->execute(array($title, $min_players, $max_players));

            // rediriger vers la page login.php
            header("Location: http://localhost/wf3_poo_nawal/views/list_game.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    public static function listGame()
    {
        // se connecter a la db (date base) ou bd (base de donnees)
        $db = Database::dbConnect();
        //preparer la requete
        $request = $db->prepare("SELECT * FROM game");
        //executer la requete
        try {
            $request->execute();
            //recuperer le resultat dans un tableau 
            $game = $request->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $game;


    }
}