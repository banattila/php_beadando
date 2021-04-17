<?php

class Felhasznalokezeles {
    public static function kiir(Felhasznalo $felhasznalo)
    {
        $file = null;
        try {
            $file = fopen("felhasznalok/felhasznalok.txt", "a");

            fwrite($file, serialize($felhasznalo) . "\n");
        } catch (Error $error) {
            header("Location: ../index.php?uzenet=" . $error->getMessage());
        } finally {
            fclose($file);
        }
        return "Sikeres mentés";

    }

    public static function torol($felhasznalok){
        $file = null;

        try {
            $file = fopen("felhasznalok/felhasznalok.txt", "w");

            foreach ($felhasznalok as $felhasznalo){
                fwrite($file, serialize($felhasznalo) . "\n");
            }
        } catch (Error $error){
            header("Location: ../index?uzenet=" . $error->getMessage() . "torol");
        } finally {
            fclose($file);
        }
    }


    public static function beolvas()
    {
        $felhasznalok = [];
        $file = null;
        try {
            $file = fopen("felhasznalok/felhasznalok.txt", "r");

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

}