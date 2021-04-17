<?php
include "config/checkCookieEnabled.php";
checkCookiesEnabled();
$felhasznalo = $_SESSION['user'];
$uzenet = "";
if (isset($_GET['uzenet']) && strlen($_GET['uzenet']) > 0 && $_GET['uzenet'] === "login"){
    $uzenet = "<p>Sikeres bejelentkezés!</p>";
    $_GET['uzenet'] = "";
}

if (isset($_POST['delete'])){
    deleteUser();
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" name="text/html"/>
    <meta name="author" content="Tóbel Dávid, Bán Attila"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=10.0, user-scalable=yes"/>
    <title><?php include "config/config.php"; getTitle();?></title>
    <link rel="icon" href="img/Kep_rolunk.png"/>
    <link rel="stylesheet" href="style/alap.css"/>
    <link rel="stylesheet" href="style/querik-animaciok.css"/>
    <link rel="stylesheet" href="style/id.css"/>
    <link rel="stylesheet" href="style/classok.css"/>
    <link rel="icon" href="img/Kep_rolunk.png"/>
</head>
<body>
<?php include_once "includes/header.php"; ?>
<main>
    <div>
        <?php echo $uzenet;?>
    </div>
    <section>
        <div>
            <?php if (isset($felhasznalo['profile']) && $felhasznalo['profile'] !== "") { ?>
            <figure>
                <img src="<?php echo $felhasznalo['profile']?>" alt="kep">
            </figure>
            <?php } ?>
        </div>
        <table>
            <caption>Profil</caption>
            <tbody>
            <?php foreach ($felhasznalo as $adatai => $adatok) {?>
                <tr>
                    <?php if ($adatai !== "profile"){ ?>
                    <th><?php echo $adatai ?></th>
                    <td><?php if(trim($adatok) === "") echo "Nincs megadva"; else echo $adatok?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </section>
    <div>
        <form method="post" action="profil.php" >
            <input type="submit" name="delete" value="Profil törlése" />
        </form>
    </div>
</main>

<?php include_once "includes/footer.php"; ?>
</body>
</html>