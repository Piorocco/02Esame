<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
        <title>Lavoro X</title>
        <meta name="viewport" content="width=device-width">
        <link href="../css/style.min.css" type="text/css" rel="stylesheet">
        <link rel="icon" href="../img/icon.png">
    </head> 
<body>
<header>
    <?php
    require_once 'funzioni.php';
    menu();
    ?>
  </header>
      <nav class="galleriaLavori">
      <h1 class="lavori">Lavoro X</h1>
      <ul class="galleriaLavoro">
      <li><img src="../img/imgLavori.jpg" class="lavoroSingolo" alt="lavoro"></li>
      <li><img src="../img/imgLavori.jpg" class="lavoroSingolo" alt="lavoro"></li>
      <li><img src="../img/imgLavori.jpg" class="lavoroSingolo" alt="lavoro"></li>
      </ul>
      <p class="lavoroText">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum cumque autem quo nostrum? Magnam consectetur rem illo iusto debitis pariatur labore, 
        in vitae blanditiis autem, excepturi quis eveniet. Laborum, numquam!
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. At totam dolores eius ipsam nulla unde numquam maiores, tenetur corporis fugit, aperiam aliquam error praesentium possimus labore temporibus recusandae, voluptatem ducimus.
    </p>
      <p><a href="lavori.html" class="button" id="lavoro" title="Torna alla galleria lavori">Torna ai lavori</a></p>
    </nav>

    <footer>
    <?php
    require_once 'funzioni.php';
    footer();
    ?>
    </footer>
    </body>
</html>