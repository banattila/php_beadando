<?php
if (isset($_GET['PHPSESSID'])){
    session_id($_GET['PHPSESSID']);
}
session_start();
$id = session_id();
$uzenetek = [];
$siker = false;

include "felhasznalok/Felhasznalokezeles.php";
include "felhasznalok/Felhasznalo.php";
include "config/checkFunctions.php";
$felhasznalok = beolvas("felhasznalok/felhasznalok.txt");

$nev = "";
$fnev = "";
$email = "";
$pwd = "";
$pwd2 = "";
$nem = "";
$velemeny = "";
$felh = null;
$szulido = "";

if (isset($_POST["submit"])) {

    try {
        $nev = checkNev();
    } catch (BeviteliAdatokException $exception){
        $uzenetek[] = $exception->getMessage();
    }

    try{
        $fnev = checkFNev($felhasznalok);
    } catch (BeviteliAdatokException $exception){
        $uzenetek[] = $exception->getMessage();
    }

    try{
        $pwd = checkPwd('pwd');
    } catch (BeviteliAdatokException $exception){
        $uzenetek[] = $exception->getMessage();
    }

    try{
        $pwd2 = checkPwd('pwd2');
    } catch (BeviteliAdatokException $exception){
        $uzenetek[] = $exception->getMessage();
    }

    try {
        checkSamePwds($pwd, $pwd2);
    } catch (BeviteliAdatokException $exception){
        $uzenetek[] = $exception->getMessage();
    }

    try {
        $email = checkEmail();
    } catch (BeviteliAdatokException $exception){
        $uzenetek[] = $exception->getMessage();
    }

    try {
        $szulido = checkAge();
    }catch (BeviteliAdatokException $exception){
        $uzenetek[] = $exception->getMessage();
    }

    //név legalább 3 karakter hosszú
/*    if (isset($_POST['nev']) && strlen($_POST['nev']) > 3){
        return $_POST['nev'];
    } else {
        $uzenetek[] = "Túl rövid a név";
    }*/

    //felhasználónév foglalt-e

/*    if (isset($_POST['fnev'])) {
        $fnev = $_POST['fnev'];

        foreach ($felhasznalok as $felhasznalo) {
            if ($felhasznalo->getFnev() === $fnev) {
                $uzenetek[] = "A felhasználónév már foglalt";
            }
        }
    }*/
    //érvényes formátumú email-cím

    /*if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $uzenetek = "Hibás email formátum";
    }*/

    //a jelszó legalább 8 karakter hosszú


    /*if (isset($_POST['pwd']) && strlen($_POST['pwd']) >= 8) {
        $pwd = $_POST['pwd'];
    } else {
        $uzenetek[] = "Legalább 8 karakter hosszú legyen a jelszó";
    }*/

    //a két jelszó megegyezik-e



    //18 évnél idősebb
    /*if (isset($_POST['bdate'])){
        $time = $_POST['bdate'];
        /*$date = date('Y-m-d');
        $currentDate = date('Y-m-d');
        $uzenet[] = $time;

    }*/


    if (count($uzenetek) === 0 ) {
        $felh = new Felhasznalo($nev, $fnev, $email, $pwd, $szulido);
        if (isset($_POST['nem'])){
            $felh->setNem($_POST['nem']);
        }
        if (isset($_POST['hirlevel'])){
            if (count($_POST['hirlevel']) > 0){
                $felh->setHirlevel(true);
            } else {
                $felh->setHirlevel(false);
            }
        }
        try {
            savePic("img/profile/", $felh);
        } catch (BeviteliAdatokException $exception){
            $uzenetek[] = $exception->getMessage();
        }


        kiir($felh, "felhasznalok/felhasznalok.txt");
        $siker = true;
    } else {
        $siker = false;
        $mutat = true;
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
    <link rel="stylesheet" href="style/alap.css"/>
    <link rel="stylesheet" href="style/querik-animaciok.css"/>
    <link rel="stylesheet" href="style/id.css"/>
    <link rel="stylesheet" href="style/classok.css"/>
    <link rel="icon" href="img/Kep_rolunk.png"/>

</head>
<body>
<?php include_once "header.php"?>
<main>
    <div class="<?php if (count($uzenetek) > 0) echo "form-container"; ?>">
        <?php
        if ($siker === true){
            if (isset($GLOBALS['suffix']) && $GLOBALS['suffix'] !== ""){
                header("Location: bejelentkezes.php". $GLOBALS['suffix'] ."&uzenet=reg");
            } else {
                header("Location: bejelntkezes.php?uzenet=reg");
            }
        } else {
            foreach ($uzenetek as $uzenet) {
                echo "<p>" . $uzenet . "</p>";
            }
        }
        ?>
    </div>
    <div class="fontos" id="regisztracio">
        <h4>Ha szeretne kapcsolatba kerülni cégünkkel, akkor az alábbi oldalon szükgéges regisztrálni</h4>

        <strong>A (*)-al jelölt mezők kitöltése kötelező</strong>
    </div>
    <div class="form-kontener">
        <form action="regisztracio.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="fontos">
            </div>
            <div class="input-container">
                <label>Név: <span>*</span>
                    <input type="text" name="nev" maxlength="30" required autocomplete="off"
                           placeholder="Gipsz Jakab" value="<?php if (isset($_POST['nev'])) echo $_POST['nev'] ?>"/>
                </label>
                <label>Felhasználónév: <span>*</span>
                    <input type="text" name="fnev" maxlength="20" required autocomplete="off"
                           placeholder="Sanyi" value="<?php if (isset($_POST['fnev'])) echo $_POST['fnev'] ?>"/>
                </label>
            </div>
            <div class="input-container">
                <label>E-mail cím:
                    <input type="email" name="email" autocomplete="off" placeholder="példa@valami.hu" required
                           value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>"/>
                </label>
            </div>
            <div class="input-container">
                <label>Jelszó: <span>*</span>
                    <input type="password" name="pwd" maxlength="20" required autocomplete="off"
                           placeholder="Minimum 8 karakter"/>
                </label>
                <label>Jelszó még egyszer: <span>*</span>
                    <input type="password" name="pwd2" maxlength="20" autocomplete="off"
                           placeholder="********" required/>
                </label>
            </div>
            <div class="input-container">
                <label>Születési idő:
                    <input type="date" name="bdate" min="1900-01-01" max="2020-01-01" required
                           value="<?php if (isset($_POST['bdate'])) echo $_POST['bdate'] ?>"/>
                </label>
            </div>
            <div class="input-container">
                <label>Ha van hozzáfűznivalója, ide nyugodtan írja le
                    <textarea name="velemeny" cols="40" rows="10" wrap="soft" maxlength="500"
                              autocomplete="off"></textarea>
                </label>
            </div>
            <div class="input-container">
                <label id="file-feltoltes">Profilkép feltöltése <img id="feltoltes-icon" src="img/upload.png"
                                                                     alt="upload"/>
                    <input type="file" name="kep" accept="image/*"/>
                </label>
            </div>

            <fieldset>
                <legend>Nem kiválasztása</legend>
                <label><input type="radio" name="nem" value="Nő" />Nő</label>
                <label><input type="radio" name="nem" value="Férfi"/>Férfi</label>
                <label><input type="radio" name="nem" value="Nem nyilatkozom" checked />Nem nyilatkozom</label>
            </fieldset>
            <fieldset>
                <label><input type="checkbox" name="hirlevel[]" value="hirlevel" checked/>Kérek hírlevelet</label>
            </fieldset>
            <div>
                <input type="submit" name="submit" value="Elküld"/>
                <input type="reset" name="reset" value="Visszaállít"/>
            </div>
        </form>
    </div>
</main>
</body>
</html>