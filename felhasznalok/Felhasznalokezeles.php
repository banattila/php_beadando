<?php

function kiir(Felhasznalo $felhasznalo, $path)
{
    $file = null;
    try {
        $file = fopen($path, "a");
        if ($file === false) {
            die("Hiba a fájl megnyitásakor");
        }
        fwrite($file, serialize($felhasznalo) . "\n");
    } catch (Error $error) {
        header("Location: ../kezdolap.php?uzenet=" . $error->getMessage());
    } finally {
        fclose($file);
    }
    echo "Kiírás befejéze" . "<br />";
    return "Sikeres mentés";

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
        header("Location: kezdolap.php?uzenet=" . $error->getMessage());
    } finally {
        if ($file != null) {
            fclose($file);
        }
    }
    return $felhasznalok;
}
