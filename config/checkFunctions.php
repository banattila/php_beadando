<?php
session_start();
include "exceptions/BeviteliAdatokException.php";


function checkNev() :string{
    if (isset($_POST['nev']) && strlen($_POST['nev']) > 3){
        return htmlspecialchars($_POST['nev']);
    } else {
        throw new BeviteliAdatokException("Hosszabb nevet adj meg");
    }
}

function checkFNev($felhasznalok): string {
    $fnev = "";
    if (isset($_POST['fnev'])) {
        $fnev = htmlspecialchars($_POST['fnev']);
        if (strlen($fnev) <=5){
            throw new BeviteliAdatokException("A felhasználónév túl rövid");
        }
        foreach ($felhasznalok as $felhasznalo) {
            if ($felhasznalo->getFnev() === $fnev) {
                throw new BeviteliAdatokException("A felhasználónév már foglalt!");

            }
        }
    }
    return $fnev;
}

function checkPwd(string $pwd): string{
    if (isset($_POST[$pwd]) && strlen($_POST[$pwd]) >= 8) {
        return htmlspecialchars($_POST[$pwd]);
    } else {
        throw new BeviteliAdatokException("A jelszó nem megfelelő!");
    }
}

function checkEmail(): string{
    if (isset($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);
        return $email;
    } else {
        throw new BeviteliAdatokException("Nem megfelelő email formátum");
    }
}

function checkSamePwds($pwd, $pwd2): bool{
    if (strlen($pwd) > 0 && strlen($pwd2) > 0 && $pwd === $pwd2){
        return true;
    } else {
        throw new BeviteliAdatokException("A két jelszó nem egyezik meg");
    }
}

function checkAge(): string{
    $bdate = "";
    if (isset($_POST['bdate'])){
        $bdate = htmlspecialchars($_POST['bdate']);
        if (time() > strtotime("+18 years", strtotime($bdate))){
            $bdate = date("Y-m-d", strtotime($bdate));
        } else {
            throw new BeviteliAdatokException("Idősebbnek kell lennie 18 évnél");
        }
    }
    return $bdate;
}

function savePic($path, Felhasznalo $felhasznalo): bool{
    if (isset($_FILES['kep'])){

        $kiterjesztesek = ["png", "jpg", "jpeg"];
        $kiterjesztes = strtolower(pathinfo($_FILES['kep']['name'], PATHINFO_EXTENSION));
        if(in_array($kiterjesztes, $kiterjesztesek)){
            if (isset($_POST['nev'])){
                $cel = $path . $_POST['nev'] . "." . strtolower(pathinfo($_FILES['kep']['name'], PATHINFO_EXTENSION));
            } else {
                $cel = $path. $_FILES['kep']['name'];
            }
            if (move_uploaded_file($_FILES['kep']['tmp_name'], $cel)){
                $felhasznalo->setProfilKep($cel);
            } else {
                throw new BeviteliAdatokException("A kép mentése nem sikerült");
            }
        } else {
            return false;
        }
    }
    return true;
}