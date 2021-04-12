<?php

if (isset($_GET['PHPSESSID'])){
    session_id($_GET['PHPSESSID']);
}
session_start();
$id = session_id();
include_once "Linkek.php";

$navLista = [
    new Linkek("index.php?PHPSESSID=". $id, "Főoldal"),
    new Linkek("szolgaltatasok.php?PHPSESSID=". $id, "Szolgáltatások"),
    new Linkek("galeria.php?PHPSESSID=". $id, "Galéria"),
    new Linkek("rolunk.php?PHPSESSID=". $id, "Rólunk")
];

if (isset($_SESSION['user'])) {
    $navLista[] = new Linkek("profil.php?PHPSESSID=". $id, "Profilom");
    $navLista[] = new Linkek("kijelentkezes.php?PHPSESSID=". $id, "Kijelentkezés");
} else {
    $navLista[] = new Linkek("bejelentkezes.php?PHPSESSID=". $id, "Bejelentkezés");
    $navLista[] = new Linkek("regisztracio.php?PHPSESSID=". $id, "Regisztráció");
}

$aktiv = explode("/", $_SERVER['REQUEST_URI'])[2];
if (strpos($aktiv, "?")){
    $aktiv = explode("?", $aktiv)[0];
}

?>

<header>

    <a href="<?php echo "index.php?PHPSESSID=" . $id ?>">
        <img src="img/Kep_rolunk.png" alt="rolunk" width="100" height="100"/>
    </a>
    <div class="icon-menu">
        <button class="icon-menu-gomb">
            Menü
        </button>
        <div class="icon-menu-tartalom">
            <ul>
                <?php
                foreach ($navLista as $link) { ?>
                    <li class="alahuz <?php if ($link->getLink() === $aktiv) echo "aktiv" ?>">
                        <a href=<?php echo $link->getLink() . "?PHPSESSID=" . $id?>>
                            <?php echo $link->getNev() ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <nav class="fo-menu">
        <ul>
            <?php foreach ($navLista as $link) { ?>
                <li class="alahuz <?php if ($link->getLink() === $aktiv) echo "aktiv" ?>">
                    <a class="alahuzott"
                       href=<?php echo $link->getLink() ?>>
                        <?php echo $link->getNev() ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</header>