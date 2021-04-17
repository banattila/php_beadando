<?php
include "config/CheckCookies.php";
CheckCookies::checkCookiesEnabled();
$uzenetek = [];
$siker = false;

if (isset($_POST['submit'])){
    include "config/Register.php";
    Register::register($uzenetek, $siker);
}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" name="text/html"/>
    <meta name="author" content="Tóbel Dávid, Bán Attila"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=10.0, user-scalable=yes"/>
    <title>Regisztráció</title>
    <link rel="stylesheet" href="style/alap.css"/>
    <link rel="stylesheet" href="style/querik-animaciok.css"/>
    <link rel="stylesheet" href="style/id.css"/>
    <link rel="stylesheet" href="style/classok.css"/>
    <link rel="icon" href="img/Kep_rolunk.png"/>

</head>
<body>
<?php include_once "includes/header.php" ?>
<main>
    <div class="<?php if (count($uzenetek) > 0) echo "form-container"; ?>">
        <?php
        if ($siker !== true){
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
<?php include_once "includes/footer.php"?>
</body>
</html>