<?php
include "config/checkCookieEnabled.php";
checkCookiesEnabled();
if (!isset($_SESSION['user'])){
    if (isset($GLOBALS['suffix']) && $GLOBALS['suffix'] !== ""){
        header("Location: bejelentkezes.php". $GLOBALS['suffix'] ."&uzenet=galeria");
    } else {
        header("Location: bejelentkezes.php?uzenet=galeria");
    }
}

include_once "config/Linkek.php";

$kepek = [
    new Linkek("img/takaritas_1.jpg", "Első kép"),
    new Linkek("img/takaritas_2.jpg", "Második kép"),
    new Linkek("img/takaritas_3.jpg", "Harmadik kép"),
    new Linkek("img/takaritas_4.jpg", "Negyedik kép"),
    new Linkek("img/takaritas_5.jpg", "Ötödik kép"),
    new Linkek("img/takaritas_6.jpg", "Hatodik kép")
];
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" name="text/html"/>
    <meta name="author" content="Tóbel Dávid, Bán Attila"/>
    <title><?php include "config/config.php";
        getTitle(); ?></title>
    <link rel="stylesheet" href="style/alap.css"/>
    <link rel="stylesheet" href="style/querik-animaciok.css"/>
    <link rel="stylesheet" href="style/id.css"/>
    <link rel="stylesheet" href="style/classok.css"/>
    <link rel="icon" href="img/Kep_rolunk.png"/>
</head>
<body>
<?php include_once "includes/header.php" ?>
<main>
    <aside>
        <div class="media">
            <audio controls>
                <source src="audio/yt1s.com%20-%20Animal%20Cannibals%20%20Takarítónő.mp3" type="audio/mpeg"/>
                Sajnos az Ön böngészője nem támogatja a hangállomány lejátszását:(
            </audio>
        </div>
        <div class="media">
            <video controls width="400" height="400">
                <source src="video/The%20funniest%20video%20you'll%20see%20today!%20Karcher%20Splash%20Guard.mp4"/>
                Sajnos az Ön böngészője nem támogatja a videó lejátszását:(
            </video>
        </div>
    </aside>
    <section id="img-kontener">
        <?php foreach ($kepek as $link) { ?>
            <figure>
                <img src="<?php echo $link->getLink() ?>" alt="takaritas"/>
                <figcaption><?php echo $link->getNev() ?></figcaption>
            </figure>
        <?php } ?>
    </section>
</main>
</body>
</html>
