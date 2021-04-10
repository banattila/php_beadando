<?php
session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" name="text/html"/>
    <meta name="author" content="Tóbel Dávid, Bán Attila"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=10.0, user-scalable=yes"/>
    <title><?php include "config/config.php";
        getTitle(); ?></title>
    <link rel="stylesheet" href="style/alap.css"/>
    <link rel="stylesheet" href="style/querik-animaciok.css"/>
    <link rel="stylesheet" href="style/id.css"/>
    <link rel="stylesheet" href="style/classok.css"/>
    <link rel="icon" href="img/Kep_rolunk.png"/>

</head>
<body>
<?php include_once "header.php" ?>
<main>
    <h1>Sikeres regisztráció<br />Kérjük jelentkezzen be a regisztráció után</h1>
    <form action="SikeresRegisztracio.php" method="post">
        <input type="submit" name="vissza" value="Jelentkezzen be!" />
    </form>
</main>

<?php include_once "footer.php" ?>
</body>
</html>


<?php
if (isset($_POST['vissza'])){
    header("Location: Bejelentkezes.php");
}
?>