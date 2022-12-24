<?php
    session_start();
    $games = array(
        array(
            "name" => "Cyberpunk 2077",
            "tags" => "Cyberpunk, Open World, RPG, Sci-fi",
            "price" => 990000,
            "in-cart" => false
        ),
        array(
            "name" => "Counter-Strike: Global Offensive",
            "tags" => "Shooter, Multiplayer, Competitive, Action",
            "price" => 0,
            "in-cart" => false
        ),
        array(
            "name" => "ELDEN RING",
            "tags" => "Souls-like, Dark Fantasy, RPG, Open World",
            "price" => 800000,
            "in-cart" => false
        ),
        array(
            "name" => "God of War",
            "tags" => "Action, Singleplayer, Adventure, Story Rich, 3D",
            "price" => 1139000,
            "in-cart" => false
        ),
        array(
            "name" => "Grounded",
            "tags" => "Survival, Multiplayer, Base Building, Co-op",
            "price" => 649000,
            "in-cart" => false
        ),
        array(
            "name" => "The Elder Scrolls V: Skyrim Special Edition",
            "tags" => "Open World, RPG, Adventure, Singleplayer",
            "price" => 499000,
            "in-cart" => false
        )
    );
    $_SESSION["games"] = $games;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<body>
    
</body>
</html>
<form action="store.php" method="GET">
    <input type="submit" value="Cửa hàng">
</form>