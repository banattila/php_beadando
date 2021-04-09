<?php
    include_once "Linkek.php";

    $navLista = [
            new Linkek("Kezdolap.php", "Főoldal"),
        new Linkek("Szolgaltatasok.php","Szolgáltatások"),
        new Linkek("Galeria.php","Galéria"),
        new Linkek("Rolunk.php" ,"Rólunk"),
        new Linkek("Kapcsolat.php","Kapcsolat")
    ]
?>

<header>
  <a href="Kezdolap.php">
    <img src="img/Kep_rolunk.png" alt="rolunk" width="100" height="100"/>
  </a>
  <div  class="icon-menu">
    <button class="icon-menu-gomb">
      Menü
    </button>
    <div class="icon-menu-tartalom">
      <ul>
          <?php foreach ($navLista as $link) { ?>
              <li class="alahuz"><a href=<?php echo $link->getLink() ?>><?php echo $link->getNev() ?></a></li>
          <?php } ?>
      </ul>
    </div>
  </div>
  <nav class="fo-menu">
    <ul>
        <?php foreach ($navLista as $link) { ?>
            <li class="alahuz"><a href=<?php echo $link->getLink() ?>><?php echo $link->getNev() ?></a></li>
        <?php } ?>
    </ul>
  </nav>
</header>