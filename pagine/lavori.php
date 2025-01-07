<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Lavori</title>
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
      <!-- qui ho creato una galleriia per i lavori, solo con immagini che saranno esplicative e con il passaggio del mouse richiameranno il colore della barra
      e al click porteranno a vedere il lavoro nello specifico con tutte le sue caratteristiche e specifiche -->
      <nav class="galleriaLavori">
        <h1 class="lavori">I MIEI LAVORI</h1>
        <ul class="galleria">
            <li><a href="lavoroSingolo.php" title="Vai al lavoro singolo"><img src="../img/imgLavori.jpg" alt="lavoro"></a></li>
            <li><a href="lavoroSingolo.php" title="Vai al lavoro singolo"><img src="../img/imgLavori.jpg" alt="lavoro"></a></li>
            <li><a href="lavoroSingolo.php" title="Vai al lavoro singolo"><img src="../img/imgLavori.jpg" alt="lavoro"></a></li>
            <li><a href="lavoroSingolo.php" title="Vai al lavoro singolo"><img src="../img/imgLavori.jpg" alt="lavoro"></a></li>
            <li><a href="lavoroSingolo.php" title="Vai al lavoro singolo"><img src="../img/imgLavori.jpg" alt="lavoro"></a></li>
            <li><a href="lavoroSingolo.php" title="Vai al lavoro singolo"><img src="../img/imgLavori.jpg" alt="lavoro"></a></li>
            <li><a href="lavoroSingolo.php" title="Vai al lavoro singolo"><img src="../img/imgLavori.jpg" alt="lavoro"></a></li>
            <li><a href="lavoroSingolo.php" title="Vai al lavoro singolo"><img src="../img/imgLavori.jpg" alt="lavoro"></a></li>
            <li><a href="lavoroSingolo.php" title="Vai al lavoro singolo"><img src="../img/imgLavori.jpg" alt="lavoro"></a></li>
        </ul>
    </nav>

    <footer>
    <?php
    require_once 'funzioni.php';
    footer();
    ?>
    </footer>
</body>
</html>