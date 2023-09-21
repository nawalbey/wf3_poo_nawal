<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>game</title>
</head>
<body>
     <form action="./traitement/action.php" method="post">
        <div>
            <label for="">title</label><br>
            <input type="text" name="title">
        </div>
        <div>
            <label for="">min_players</label><br>
            <input type="text" name="min_players">
        </div>
        <div>
            <label for="">max_players</label><br>
            <input type="text" name="max_players">

            <button name="game_submit">connexion</button>
        </div>
    </form>
</body>
</html>