<?php
session_start();
// faire apl a notre fichier userModel
require_once $_SERVER["DOCUMENT_ROOT"] . "/wf3_poo_nawal/models/playerModel.php";
require_once "../../models/gameModel.php";
require_once "../../models/contestModel.php";
require_once "../../models/playerModel.php";


if (isset($_POST['game_submit'])) {
    $title = htmlspecialchars($_POST['title']);
    $min_players = htmlspecialchars($_POST['min_players']);
    $max_players = htmlspecialchars($_POST['max_players']);

    Game::addGame($title, $min_players, $max_players);
}

if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $nickname = htmlspecialchars($_POST['nickname']);


    Player::addPlayer($email, $nickname);

}

if (isset($_POST['contest_submit'])) {
    $game_id = htmlspecialchars($_POST['game']);
    $start_date = htmlspecialchars($_POST['start_date']);


    Contest::addContest($game_id, $start_date);

}