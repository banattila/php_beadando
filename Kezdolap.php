<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" content="text/html"/>
    <meta charset="UTF-8"/>
    <meta name="author" content="Tóbel Dávid, Bán Attila"/>
    <title><?php include "config/config.php"; getTitle();?></title>
    <link rel="stylesheet" href="style/alap.css"/>
    <link rel="stylesheet" href="style/querik-animaciok.css"/>
    <link rel="stylesheet" href="style/id.css"/>
    <link rel="stylesheet" href="style/classok.css"/>
    <link rel="icon" href="img/Kep_rolunk.png"/>
</head>
<body>
<?php include_once "header.php" ?>
<main>
    <h1>Üdvözlöm az LHB Clean honlapján</h1>
    <aside>
        <iframe src="Galeria.php#img-kontener" allow="autoplay" width="300px" height="450px"></iframe>
    </aside>
    <section>
        <h2>Bemutatkozás</h2>
        <p>Szabó Lehel vagyok, <em>az LHB Clean Kft.</em> ügyvezetője és egyben alapítója. Több, mint 15 éve
            foglalkozom takarítással. Ez idő alatt lehetőségem volt megismerni, majd alkalmazni a legmodernebb
            technológiákat, ezzel növelve a cég munkájának hatékonyságát.</p>
        <p>A mindennapokban is szem előtt tartom a környezettudatos életvitelt, így nem volt kérdés, hogy a cég
            profiljába is beépítem. A cég mottója is innen ered: <em>Tisztán Másképp.</em> Munkáink során, ahol
            a munkafolyamat lehetővé teszi, csakis öko tisztítószereket alkalmazunk.</p>
        <p>A célom, hogy ügyfeleink teljes mértékben elégedettek legyenek az elvégzett munkával, dolgozóink teljes
            mértékű megbecsülése mellett.</p>
        <p>Jelenleg is több állandó munkánk van, az irodatakarítástól az ablaktisztításig. A napi takarítástól az
            alkalmi munkáig. A három legfontosabb dolognak, amely munkánkat is jellemzi, <em>a minőséget,
                precizitást</em> és a <em>megbízhatóságot</em> tartjuk.</p>
    </section>
    <section id="adatok">
        <div class="adat">
            <div>
                <table>
                    <caption>Cégadatok</caption>
                    <thead>
                        <tr>
                            <th id="mezok">Mezők</th>
                            <th id="tabla-adat">Adatok</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td headers="mezok">Teljes név</td>
                        <td headers="tabla-adat">LHB Clean Korlátolt Felelősségű Társaság.</td>
                    </tr>
                    <tr>
                        <td headers="mezok">Székhely</td>
                        <td headers="tabla-adat">2094 Nagykovácsi, Pilis utca 37.</td>
                    </tr>
                    <tr>
                        <td headers="mezok">Adószám</td>
                        <td headers="tabla-adat">28973971-2-13</td>
                    </tr>
                    <tr>
                        <td headers="mezok">Cégjegyzék szám</td>
                        <td headers="tabla-adat">13-09-209687</td>
                    </tr>
                    <tr>
                        <td headers="mezok">Főtevékenység</td>
                        <td headers="tabla-adat">13-09-209687</td>
                    </tr>
                    <tr>
                        <td headers="mezok"><a href="tel:+36702108264">Telefon</a></td>
                        <td headers="tabla-adat"><a href="tel:+36702108264">+36 70 210 82 64</a></td>
                    </tr>
                    <tr>
                        <td headers="mezok"><a href="mailto:info@lhbclean.hu">Email</a></td>
                        <td headers="tabla-adat"><a href="mailto:info@lhbclean.hu">info@lhbclean.hu</a></td>
                    </tr>
                    <tr>
                        <td headers="mezok"><a href="https://lhbclean.hu">Web</a></td>
                        <td headers="tabla-adat"><a href="https://lhbclean.hu">lhbclean.hu</a></td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <div id="szolgaltatas">
                <h3>SZOLGÁLTATÁSAINK</h3>
                <ul>
                    <li><a href="Szolgaltatasok.php#ablaktisztitas">Ablaktisztítás</a></li>
                    <li><a href="Szolgaltatasok.php#garazstakaritas">Garázstakarítás</a></li>
                    <li><a href="Szolgaltatasok.php#iroda-takaritas">Iroda Takarítás</a></li>
                    <li><a href="Szolgaltatasok.php#padloszonyeg">Padlószőnyeg Takarítás</a></li>
                    <li><a href="Szolgaltatasok.php#pvc-padlo">PVC padló tisztítás és bevonatolás</a></li>
                </ul>
            </div>
        </div>
    </section>
</main>
<?php include_once "footer.php" ?>
</body>
</html>
