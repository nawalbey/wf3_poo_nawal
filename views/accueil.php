<?php

require_once "../inc/header.php";
require_once "../inc/nav.php";
require_once "../models/gameModel.php";
require_once "../models/playerModel.php";
require_once "../models/contestModel.php";

$listGame = Game::listGame();
$listPlayer = Player::listPlayer();
$listContest = Contest::listContest();
?>

<div class="container">
    <h1>liste Player</h1>
    <table>
        <?php foreach ($listPlayer as $player) { ?>

            <tr class="player">
                <td>
                    <?= $player['id']; ?>
                </td>
                <td>
                    <?= $player['nickname']; ?>
                </td>
                <td>
                    <?= $player['email']; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<?php
$listGame = Game::listGame();
$listPlayer = Player::listPlayer();

?>
<div class="container">
    <h1>liste game</h1>
    <table>
        <?php foreach ($listGame as $game) { ?>
            <tr class="player">
                <td>
                    <?= $game['id']; ?>
                </td>
                <td>
                    <?= $game['title']; ?>
                </td>
                <td>
                    <?= $game['min_players']; ?>
                </td>

                <td>
                    <?= $game['max_players']; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<div class="container">
    <h1>liste contest</h1>
    <table>
        <thead>
            <tr>
                 <td> ID Match</td>
                 <td>Nombre de joueurs</td>
                 <td>Date de démarrage</td>
                 <td>Pseudonyme</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listContest as $contest) { ?>
                <?php if (strtotime($contest['start_date']) > strtotime(date("Y-m-d"))) { ?>
                    <tr style="background-color: beige;">
                        <td>
                            <?= $contest['id']; ?>
                        </td>
                        <td>
                            <?= $contest['nombre_de_joueurs']; ?>
                        </td>
                        <td>
                            <?= $contest['start_date']; ?>
                        </td>
                        <td>
                            <?= $contest['nickname']; ?>
                        </td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td>
                            <?= $contest['id']; ?>
                        </td>
                        <td>
                            <?= $contest['nombre_de_joueurs']; ?>
                        </td>
                        <td>
                            <?= $contest['start_date']; ?>
                        </td>
                        <td>
                            <?= $contest['nickname']; ?>
                        </td>
                    </tr>
                <?php }
            } ?>
        </tbody>
    </table>
    <div>

        <?php

        require_once "../inc/footer.php";