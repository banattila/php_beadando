<?php
include "../felhasznalok/Felhasznalo.php";

function kiir(Felhasznalo $felhasznalo, $path)
{
    $file = null;
    try {
        $file = fopen($path, "a");

        fwrite($file, serialize($felhasznalo) . "\n");
    } catch (Error $error) {
        header("Location: ../index.php?uzenet=" . $error->getMessage());
    } finally {
        fclose($file);
    }
    return "Sikeres mentés";

}

function torol($path, $felhasznalok){
    $file = null;

    try {
        $file = fopen($path, "w");

        foreach ($felhasznalok as $felhasznalo){
            fwrite($file, serialize($felhasznalo) . "\n");
        }
    } catch (Error $error){
        header("Location: ../index?uzenet=" . $error->getMessage() . "torol");
    } finally {
        fclose($file);
    }
}


function beolvas($path)
{
    $felhasznalok = [];
    $file = null;
    try {
        $file = fopen($path, "r");

        while (($line = fgets($file)) !== false) {
            $felhasznalo = unserialize($line);
            $felhasznalok[] = $felhasznalo;
        }
    } catch (Error $error) {
        header("Location: ../index.php?uzenet=" . $error->getMessage());
    } finally {
        if ($file != null) {
            fclose($file);
        }
    }
    return $felhasznalok;
}
