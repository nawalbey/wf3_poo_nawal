<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/wf3_poo_nawal/models/database.php";

class Contest
{
    public static function addContest($game_id, $start_date)
    {

        // on appel la fonction dbConnect qui est dans la class Database
        $db = Database::dbConnect();

        // preparation de la requête
        $request = $db->prepare("INSERT INTO `contest`(`game_id`, `start_date`) VALUES(?,?)");

        // exécuter la requête
        try {
            $request->execute(array($game_id, $start_date,));

            // rediriger vers la page login.php
            header("Location: http://localhost/wf3_poo_nawal/views/list_contest.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public static function listContest()
    {
        // se connecter a la data base
        $db = Database::dbConnect();
        // preparer la requete
        $request = $db->prepare("SELECT c.*, g.*, p.*, COUNT(cp.player_id) AS nombre_de_joueurs  FROM contest c  LEFT JOIN player p ON c.winner_id = p.id  LEFT JOIN game g ON c.game_id = g.id  LEFT JOIN player_contest cp ON c.id = cp.contest_id  GROUP BY c.id, g.id  ORDER BY c.start_date DESC;");
        // executer la requete
        try {
            $request->execute();
            // recuperer le resultat de la requete dans un tableau listPlayer

            $listContest = $request->fetchAll();
            return $listContest;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}