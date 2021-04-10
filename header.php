<?php
session_start();
include_once "Linkek.php";

$navLista = [
    new Linkek("Kezdolap.php", "Főoldal"),
    new Linkek("Szolgaltatasok.php", "Szolgáltatások"),
    new Linkek("Galeria.php", "Galéria"),
    new Linkek("Rolunk.php", "Rólunk")
];

if (isset($_SESSION['user'])) {
    $navLista[] = new Linkek("Profil.php", "Profilom");
    $navLista[] = new Linkek("Kijelentkezes.php", "Kijelentkezés");
} else {
    $navLista[] = new Linkek("Bejelentkezes.php", "Bejelentkezés");
    $navLista[] = new Linkek("Regisztracio.php", "Regisztráció");
}

$aktiv = explode("/", $_SERVER['REQUEST_URI'])[2];

?>

<header>
    <a href="Kezdolap.php">
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