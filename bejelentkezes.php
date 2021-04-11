<?php
session_start();
include "felhasznalok/Felhasznalokezeles.php";
include "felhasznalok/Felhasznalo.php";
$felhasznalok = beolvas("felhasznalok/felhasznalok.txt");

$fh = null;
$fnev = "";
$pwd = "";
$uzenet = "Sikertelen belépés";

if (isset($_POST['login'])) {
    if (!isset($_POST['fnev']) || trim($_POST['fnev']) === "" || !isset($_POST['pwd']) || trim($_POST['pwd']) === "") {
        $uzenet = "Minden mezőt ki kell tölteni";
    } else {
        $fnev = $_POST['fnev'];
        $pwd = $_POST['pwd'];
    }

    foreach ($felhasznalok as $felhasznalo) {
        if ($felhasznalo instanceof Felhasznalo) {
            if ($felhasznalo->getFnev() === $fnev && $felhasznalo->getPwd() === $pwd) {
                $uzenet = "Sikeres belépés";
                $_SESSION['user'] = $felhasznalo;
                header("Location: kezdolap.php");
            }
        }
    }
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
<?php include_once "header.php"; ?>
<main>
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
    <div>
        <?php
            echo "<p>" . $uzenet . "</p>";
        ?>
    </div>
</main>
<?php include_once "footer.php"; ?>
</body>
</html>