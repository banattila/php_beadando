<?php

class Register{


    public static function register(&$uzenetek, &$siker){
        include "config/Checker.php";
        include "felhasznalok/Felhasznalokezeles.php";
        include "felhasznalok/Felhasznalo.php";

        $felhasznalok = Felhasznalokezeles::beolvas();
        $checker = new Checker();

        try {
            $nev = $checker->checkNev();
        } catch (BeviteliAdatokException $exception){
            $uzenetek[] = $exception->getMessage();
        }

        try{
            $fnev = $checker->checkFNev($felhasznalok);
        } catch (BeviteliAdatokException $exception){
            $uzenetek[] = $exception->getMessage();
        }

        try{
            $pwd = $checker->checkPwd('pwd');
        } catch (BeviteliAdatokException $exception){
            $uzenetek[] = $exception->getMessage();
        }

        try{
            $pwd2 = $checker->checkPwd('pwd2');
        } catch (BeviteliAdatokException $exception){
            $uzenetek[] = $exception->getMessage();
        }

        try {
            $checker->checkSamePwds('pwd', 'pwd2');
        } catch (BeviteliAdatokException $exception){
            $uzenetek[] = $exception->getMessage();
        }

        try {
            $email = $checker->checkEmail();
        } catch (BeviteliAdatokException $exception){
            $uzenetek[] = $exception->getMessage();
        }

        try {
            $szulido = $checker->checkAge();
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
                $checker->savePic("img/profile/", $felh);
            } catch (BeviteliAdatokException $exception){
                $uzenetek[] = $exception->getMessage();
            }


            Felhasznalokezeles::kiir($felh, );
            $siker = true;
        } else {
            $siker = false;
        }

        if ($siker === true) {
            if (isset($GLOBALS['suffix']) && $GLOBALS['suffix'] !== "") {
                header("Location: bejelentkezes.php" . $GLOBALS['suffix'] . "&uzenet=reg");
            } else {
                header("Location: bejelentkezes.php?uzenet=reg");
            }
        }
    }
}
