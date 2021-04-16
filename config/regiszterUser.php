<?php

function register(&$uzenetek, &$siker){
    include "config/checkFunctions.php";
    include "felhasznalok/Felhasznalokezeles.php";
    include "felhasznalok/Felhasznalo.php";

    $felhasznalok = beolvas("felhasznalok/felhasznalok.txt");

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
    }
}
