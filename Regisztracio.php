<?php
session_start();
$uzenetek = [];
$siker = false;
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
<main>
    <div class="fontos" id="regisztracio">
        <h4>Ha szeretne kapcsolatba kerülni cégünkkel, akkor az alábbi oldalon szükgéges regisztrálni</h4>

        <strong>A (*)-al jelölt mezők kitöltése kötelező</strong>
    </div>
    <div id="form-kontener">
        <form action="Regisztracio.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="fontos">
            </div>
            <div class="input-container">
                <label>Név: <span>*</span>
                    <input type="text" name="nev" maxlength="30" required autocomplete="off"
                           placeholder="Gipsz Jakab"/>
                </label>
                <label>Felhasználónév: <span>*</span>
                    <input type="text" name="fnev" maxlength="20" required autocomplete="off"
                           placeholder="Sanyi"/>
                </label>
            </div>
            <div class="input-container">
                <label>E-mail cím:
                    <input type="email" name="email" autocomplete="off" placeholder="példa@valami.hu" required/>
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
                    <input type="date" name="bdate" min="1900-01-01" max="2003-01-01" required/>
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
                    <input type="file" name="kep"/>
                </label>
            </div>
            <input type="hidden" id="rejtettId" name="rejtett" value="1234"/>
            <fieldset>
                <legend>Nem kiválasztása</legend>
                <label><input type="radio" name="nem"/>Nő</label>
                <label><input type="radio" name="nem"/>Férfi</label>
                <label><input type="radio" name="nem"/>Nem nyilatkozom</label>
            </fieldset>
            <fieldset>
                <label><input type="checkbox" name="hirlevel" value="hirlevel" checked/>Kérek hírlevelet</label>
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

        <?php
        include_once "Felhasznalokezeles.php";
        $felhasznalok = beolvas("felhasznalok.txt");


        $nev = "";
        $fnev = "";
        $email = "";
        $pwd = "";
        $pwd2 = "";
        $siker = false;

        if (isset($_POST["submit"])) {

            //név legalább 3 karakter hosszú
            if (isset($_POST['nev']) && strlen($_POST['nev']) > 3) {
                $nev = $_POST['nev'];
            }

            //felhasználónév foglalt-e
            if (isset($_POST['fnev'])) {
                $fnev = $_POST['fnev'];

                foreach ($felhasznalok as $felhasznalo) {
                    if ($felhasznalo->getFnev() === $fnev) {
                        $uzenetek[] = "A felhasználónév már foglalt";
                    }
                }
            }
            //érvényes formátumú email-cím

            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            }

            //a jelszó legalább 5 karakter hosszú

            if (isset($_POST['pwd']) && strlen($_POST['pwd']) > 5) {
                $pwd = $_POST['pwd'];
            } else {
                $uzenetek[] = "Legalább 5 karakter hosszú legyen a jelszó";
            }

            //a két jelszó megegyezik-e

            if (!isset($_POST['pwd']) || !isset($_POST['pwd2']) || $_POST['pwd'] !== $_POST['pwd2']) {
                $uzenetek[] = "A két jelszó nem egyezik meg";
                echo "jelszo: " . $_POST['pwd'] . ", jelszo2: " . $_POST['pwd2'];
            }
        }
        if (count($uzenetek) === 0) {
            echo "Sikeresen regisztráltál!" . "<br />";
            $felh = new Felhasznalo($nev, $fnev, $email, $pwd);
            echo $felh->getNev() . "<br />" . $felh->getFnev() . "<br />" . $felh->getEmail() . "<br />" . $felh->getPwd();
            kiir($felh, "felhasznalok.txt");
            header("Location: SikeresRegisztracio.php");

        } else {
            foreach ($uzenetek as $uzenet) {
                echo "<p>" . $uzenet . "</p>";
            }
        }
        ?>

