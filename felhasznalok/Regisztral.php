<?php
/*include_once "Felhasznalokezeles.php";
include_once "Felhasznalo.php";
$felhasznalok = beolvas("felhasznalok.txt");


$nev = "";
$fnev = "";
$email = "";
$pwd = "";
$pwd2 = "";
$siker = false;

$uzenetek = [];

if (isset($_POST["submit"])) {

    //név legalább 3 karakter hosszú
    if (isset($_POST['nev']) && strlen($_POST['nev']) > 3) {
        $nev = $_POST['nev'];
    }

    //felhasználónév foglalt-e
    if (isset($_POST['fnev'])){
        $fnev = $_POST['fnev'];

        foreach ($felhasznalok as $felhasznalo){
            if ($felhasznalo->getFnev() === $fnev){
                $uzenetek[] = "A felhasználónév már foglalt";
            }
        }
    }
    //érvényes formátumú email-cím

    if (isset($_POST['email'])){
        $email = $_POST['email'];
    }

    //a jelszó legalább 5 karakter hosszú

    if (isset($_POST['pwd']) && strlen($_POST['pwd']) > 5){
        $pwd = $_POST['pwd'];
    } else {
        $uzenetek[] = "Legalább 5 karakter hosszú legyen a jelszó";
    }

    //a két jelszó megegyezik-e

    if (!isset($_POST['pwd']) || !isset($_POST['pwd2']) || $_POST['pwd'] !== $_POST['pwd2']){
        $uzenetek[] = "A két jelszó nem egyezik meg";
        echo "jelszo: " . $_POST['pwd'] . ", jelszo2: " . $_POST['pwd2'];
    }
}
if (count($uzenetek) === 0){
    echo "Sikeresen regisztráltál!" . "<br />";
    $felh = new Felhasznalo($nev, $fnev, $email, $pwd);
    echo $felh->getNev()  . "<br />" . $felh->getFnev()  . "<br />" . $felh->getEmail()  . "<br />" . $felh->getPwd();
    kiir($felh, "felhasznalok.txt");
    header("Location: sikeresRegisztracio.php");

} else {
    foreach ($uzenetek as $uzenet){
        echo $uzenet;
    }
}*/