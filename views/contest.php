<?php

require_once "../models/gameModel.php";
$listGame = Game::listGame();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contest</title>
</head>

<body>
    <form action="./traitement/action.php" method="post">
        <div>


            <label>game :</label>
            <select name="game" class="form-control">
                <option value="">choose game</option>
                <?php foreach ($listGame as $game) { ?>
                    <option value="<?= $game["id"] ?>">
                        <?= $game["title"] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div>

            <label for="">start date</label><br>
            <input type="date" name="start_date">
        </div>
        <div>
            <button name="contest_submit">connexion</button>
        </div>
    </form>
</body>

</html>