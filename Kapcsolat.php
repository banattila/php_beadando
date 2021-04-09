<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" , name="text/html"/>
    <meta name="author" content="Tóbel Dávid, Bán Attila"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=10.0, user-scalable=yes"/>
    <title>Kapcsolat</title>
    <link rel="stylesheet" href="style/alap.css"/>
    <link rel="stylesheet" href="style/querik-animaciok.css"/>
    <link rel="stylesheet" href="style/id.css"/>
    <link rel="stylesheet" href="style/classok.css"/>
    <link rel="icon" href="img/Kep_rolunk.png"/>

</head>
<body>
<?php include_once "header.php" ?>
<main>
    <div class="fontos" id="regisztracio">
        <h4>Ha szeretne kapcsolatba kerülni cégünkkel, akkor az alábbi oldalon szükgéges regisztrálni</h4>

        <strong>A (*)-al jelölt mezők kitöltése kötelező</strong>
    </div>
    <div id="form-kontener">
        <form action="felhasznalok/Regisztral.php" method="post" enctype="multipart/form-data" autocomplete="off">
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
                <label>Url cím:
                    <input type="url" name="url" autocomplete="off" placeholder="www.valami.hu"/>
                </label>
            </div>
            <div class="input-container">
                <label>Jelszó: <span>*</span>
                    <input type="password" name="pwd" maxlength="20" required autocomplete="off"
                           placeholder="Minimum 8 karakter"/>
                </label>
                <label>Jelszó még egyszer: <span>*</span>
                    <input type="password" name="pwd_again" maxlength="20" autocomplete="off"
                           placeholder="********" required/>
                </label>
            </div>
            <div class="input-container">
                <label>Születési idő:
                    <input type="date" name="bdate" min="1990-01-01" max="2003-01-01" value="1990-01-01"/>
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
                <label><input type="checkbox" name="hirlevel" value="hirlevel" checked />Kérek hírlevelet</label>
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
