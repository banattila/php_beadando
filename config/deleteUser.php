<?php
include "felhasznalok/Felhasznalo.php";
include "felhasznalok/Felhasznalokezeles.php";
function deleteUser(){

    $felhasznalok = beolvas("felhasznalok/felhasznalok.txt");
    $key = 0;
    foreach ($felhasznalok as $felh){
        if ($felh instanceof Felhasznalo){
            if ($felh->getFnev() === $_SESSION['user']['Felhasználónév']){
                break;
            }
        }
        $key++;
    }
    echo $key;
    unset($felhasznalok[$key]);
    torol("felhasznalok/felhasznalok.txt", $felhasznalok);
}
