<?php
session_start();
include_once "Linkek.php";

$navLista = [
    new Linkek("kezdolap.php", "Főoldal"),
    new Linkek("szolgaltatasok.php", "Szolgáltatások"),
    new Linkek("galeria.php", "Galéria"),
    new Linkek("rolunk.php", "Rólunk")
];

if (isset($_SESSION['user'])) {
    $navLista[] = new Linkek("profil.php", "Profilom");
    $navLista[] = new Linkek("kijelentkezes.php", "Kijelentkezés");
} else {
    $navLista[] = new Linkek("bejelentkezes.php", "Bejelentkezés");
    $navLista[] = new Linkek("regisztracio.php", "Regisztráció");
}

$aktiv = explode("/", $_SERVER['REQUEST_URI'])[2];
if (strpos($aktiv, "?")){
    $aktiv = explode("?", $aktiv)[0];
}

?>

<header>
    <a href="kezdolap.php">
        <img src="img/Kep_rolunk.png" alt="rolunk" width="100" height="100"/>
    </a>
    <div class="icon-menu">
        <button class="icon-menu-gomb">
            Menü
        </button>
        <div class="icon-menu-tartalom">
            <ul>
                <?php foreach ($navLista as $link) { ?>
                    <li class="alahuz <?php if ($link->getLink() === $aktiv) echo "aktiv" ?>">
                        <a href=<?php echo $link->getLink() ?>>
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