<?php
setcookie("testcookie", "hello");
if (!isset($_COOKIE['testcookie'])){
    if (isset($_GET['PHPSESSID'])){
        session_id($_GET['PHPSESSID']);
    }
}
session_start();
$id = session_id();
include "felhasznalok/Felhasznalokezeles.php";
include "felhasznalok/Felhasznalo.php";
$felhasznalok = beolvas("felhasznalok/felhasznalok.txt");

$fh = null;
$fnev = "";
$pwd = "";
$bejelentkezesUzenet = "";


if (isset($_GET['uzenet'])){
    if ($_GET['uzenet'] === "galeria"){
        $bejelentkezesUzenet = "A galéria megtekintéséhez be kell jelentkeznie!";
    } else if($_GET['uzenet'] === "logout"){
        $bejelentkezesUzenet = "Sikeresen kijelentkeztél!";
    } else if($_GET['uzenet'] === "reg"){
        $bejelentkezesUzenet = "A regisztráció sikeres volt!<br/>Kérem jelentkezzen be!";
    }
}
if (isset($_POST['login'])) {
    if (!isset($_POST['fnev']) || trim($_POST['fnev']) === "" || !isset($_POST['pwd']) || trim($_POST['pwd']) === "") {
        $bejelentkezesUzenet = "Minden mezőt ki kell tölteni";
    } else {
        $fnev = $_POST['fnev'];
        $pwd = $_POST['pwd'];
        $bejelentkezesUzenet = "Sikertelen belépés";

        foreach ($felhasznalok as $felhasznalo) {
            if ($felhasznalo instanceof Felhasznalo) {
                if ($felhasznalo->getFnev() === $fnev && $felhasznalo->getPwd() === $pwd) {
                    $bejelentkezesUzenet = "Sikeres belépés";
                    $b = [];
                    $b['Név'] = $felhasznalo->getnev();
                    $b['Felhasználónév'] = $felhasznalo->getFnev();
                    $b['Email cím'] = $felhasznalo->getEmail();
                    $b['Neme'] = $felhasznalo->getNem();
                    $b['Születési idő'] = $felhasznalo->getSzulido();
                    $b['profile'] = $felhasznalo->getProfilKep();
                    $b['Hírlevelet kér'] = ($felhasznalo->getHirlevel())?"Igen":"Nem";
                    $_SESSION['user'] = $b;
                    header("Location: profil.php?PHPSESSID=". session_id());
                }
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

    <div class="<?php if ($bejelentkezesUzenet !== "") echo "form-kontener"; ?>">
        <?php
        echo "<p>" . $bejelentkezesUzenet . "</p>";
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
<?php include_once "footer.php"; ?>
</body>
</html>