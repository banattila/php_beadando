<?php

session_start();
$id = session_id();

$messages = "";
include "config/bejelentkez.php";

if (isset($_GET['uzenet'])){
    messages($messages);
}
if (isset($_POST['login'])) {
    login($messages);
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" name="text/html"/>
    <meta name="author" content="Tóbel Dávid, Bán Attila"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=10.0, user-scalable=yes"/>
    <title><?php include "config/config.php";
        getTitle(); ?></title>
    <link rel="icon" href="img/Kep_rolunk.png"/>
    <link rel="stylesheet" href="style/alap.css"/>
    <link rel="stylesheet" href="style/querik-animaciok.css"/>
    <link rel="stylesheet" href="style/id.css"/>
    <link rel="stylesheet" href="style/classok.css"/>
    <link rel="icon" href="img/Kep_rolunk.png"/>
</head>
<body>
<?php include_once "includes/header.php"; ?>
<main>

    <div class="<?php if ($messages !== "") echo "form-kontener"; ?>">
        <?php
        echo "<p>" . $messages . "</p>";
        ?>
    </div>
    <div class="form-kontener">
        <form action="bejelentkezes.php" method="post" autocomplete="off">
            <label>Felhasználónév:
                <input type="text" name="fnev" placeholder="Gipsz Jakab" maxlength="30" autocomplete="off" required
                       class="belep"/>
            </label>
            <label>Jelszó:
                <input type="password" name="pwd" placeholder="*****" maxlength="20" autocomplete="off" required
                       class="belep"/>
            </label>
            <input type="submit" name="login" value="Belép"/>
        </form>
    </div>
    <div class="form-kontener">
        <h3><a href="regisztracio.php">Ha még nem regisztráltál, akkor itt megteheted</a></h3>
    </div>
</main>
<?php include_once "includes/footer.php"; ?>
</body>
</html>