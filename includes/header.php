<?php
if (isset($GLOBALS['suffix'])){
    $suffix = $GLOBALS['suffix'];
} else {
    $suffix = "";
}

include_once "config/Linkek.php";

$navLista = [
    new Linkek("index.php". $suffix, "Főoldal"),
    new Linkek("szolgaltatasok.php" . $suffix, "Szolgáltatások"),
    new Linkek("galeria.php" . $suffix, "Galéria"),
    new Linkek("rolunk.php" . $suffix, "Rólunk")
];

if (isset($_SESSION['user'])) {
    $navLista[] = new Linkek("profil.php" .$suffix, "Profilom");
    $navLista[] = new Linkek("kijelentkezes.php" . $suffix, "Kijelentkezés");
} else {
    $navLista[] = new Linkek("bejelentkezes.php" . $suffix, "Bejelentkezés");
    $navLista[] = new Linkek("regisztracio.php" . $suffix, "Regisztráció");
}

$aktiv = explode("/", $_SERVER['REQUEST_URI'])[2];
if (strpos($aktiv, "?")){
    $aktiv = explode("?", $aktiv)[0];
}
$GLOBALS['title'] = "";

?>

<header>

    <a href="<?php echo "index.php" . $suffix ?>">
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
                        <a href=<?php echo $link->getLink() . $GLOBALS['suffix']?>>
                            <?php echo $link->getNev();?>
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