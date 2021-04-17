<?php


class DeleteUser {

    public static function deleteUser(){
        include "felhasznalok/Felhasznalo.php";
        include "felhasznalok/Felhasznalokezeles.php";

        $felhasznalok = Felhasznalokezeles::beolvas();
        $key = 0;
        foreach ($felhasznalok as $felh){
            if ($felh instanceof Felhasznalo){
                if ($felh->getFnev() === $_SESSION['user']['Felhasználónév']){
                    if ($felh->getProfilKep() !== ""){
                        unlink($felh->getProfilKep());
                    }
                    break;
                }
            }
            $key++;
        }
        unset($felhasznalok[$key]);

        Felhasznalokezeles::torol($felhasznalok);

        $_SESSION = array();
        if (isset($_COOKIE)){
            setcookie(session_name(), session_id(), time() - 3600, "/");
        }
        session_destroy();
        header("Location: regisztracio.php?uzenet=delete");
    }
}
