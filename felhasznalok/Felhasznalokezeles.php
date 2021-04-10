<?php

function kiir(Felhasznalo $felhasznalo, $path){
        echo "Kiírás kezdése" . "<br />";
        $file = fopen($path, "a");
        if ($file === false){
            die("Hiba a fájl megnyitásakor");
        }
        fwrite($file, serialize($felhasznalo) .  "\n");
        fclose($file);
        echo "Kiírás befejéze" . "<br />";
        return "Sikeres mentés";

}

function beolvas($path) {
        $felhasznalok = [];
        $f = fopen($path, "r");
        if ($f === false){
            die("Hiba a fájl megnyitásakor");
        }

        while (($line = fgets($f)) !== false){
            $felhasznalo = unserialize($line);
            $felhasznalok[] = $felhasznalo;
        }

        fclose($f);
        return $felhasznalok;
}
