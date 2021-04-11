<?php
session_start();
    $keszitok = [
            "Tóbel Dávid",
            "Bán Attila"
    ];

    function keszitok(){
        global $keszitok;
        $footer = "<p>Készítette: ";
        $index = 0;
        while ($index < sizeof($keszitok)){

            if ($index === sizeof($keszitok) - 1 ){
                $footer .= " és ";
            }
            $footer .= "<span>" . $keszitok[$index];

            if ($index < sizeof($keszitok) - 2){
                $footer .= ", ";
            }
            $footer .= "</span>";
            $index++;
        }
        $footer .= "</p>";
        return $footer;
    }
?>

<footer>
    <?php echo keszitok() ?>
</footer>