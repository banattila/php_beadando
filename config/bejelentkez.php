<?php

function messages(&$messages)
{
    if ($_GET['uzenet'] === "galeria") {
        $messages = "A galéria megtekintéséhez be kell jelentkeznie!";
    } else if ($_GET['uzenet'] === "logout") {
        $messages = "Sikeresen kijelentkeztél!";
    } else if ($_GET['uzenet'] === "reg") {
        $messages = "A regisztráció sikeres volt! Kérem jelentkezzen be!";
    }
}

function login(&$messages)
{
    include "felhasznalok/Felhasznalokezeles.php";
    include "felhasznalok/Felhasznalo.php";
    $felhasznalok = beolvas("felhasznalok/felhasznalok.txt");

    if (!isset($_POST['fnev']) || trim($_POST['fnev']) === "" || !isset($_POST['pwd']) || trim($_POST['pwd']) === "") {
        $messages = "Minden mezőt ki kell tölteni";
    } else {
        $fnev = $_POST['fnev'];
        $pwd = $_POST['pwd'];
        $messages = "Sikertelen belépés";

        foreach ($felhasznalok as $felhasznalo) {
            if ($felhasznalo instanceof Felhasznalo) {
                if ($felhasznalo->getFnev() === $fnev && $felhasznalo->getPwd() === $pwd) {
                    $messages = "Sikeres belépés";
                    $adatok = [];
                    $adatok['Név'] = $felhasznalo->getnev();
                    $adatok['Felhasználónév'] = $felhasznalo->getFnev();
                    $adatok['Email cím'] = $felhasznalo->getEmail();
                    $adatok['Neme'] = $felhasznalo->getNem();
                    $adatok['Születési idő'] = $felhasznalo->getSzulido();
                    $adatok['profile'] = $felhasznalo->getProfilKep();
                    $adatok['Hírlevelet kér'] = ($felhasznalo->getHirlevel()) ? "Igen" : "Nem";
                    $_SESSION['user'] = $adatok;
                    if (isset($_COOKIE['testcookie'])){
                        header("Location: profil.php?uzenet=login");
                    } else {
                        header("Location: profil.php?PHPSESSID=" . session_id());
                    }
                }
            }
        }
    }
}
