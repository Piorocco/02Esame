<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
        <meta name="viewport" content="width=device-width">
        <!-- qui collego il file css al file html -->
        <link href="../css/style.min.css" type="text/css" rel="stylesheet">
        <!-- qui metto l'icona che verrà visualizzata in alto nel sito -->
        <link rel="icon" href="../img/icon.png" >
    </head> 
<body>
  <header>
    <?php
    require_once 'funzioni.php';
    menu();
    ?>
  </header>
      <!-- questa è la sezione principale della home page -->
      <div class="overlay"></div>
    <div class="hero">
        <div class="hero__content">
            <p class="normalText">Piorocco Brindisi</p>
            <p class="introText">Full stack developer</p>
            <a href="#img1" class="button" title="Scopri di più">Chi sono</a>
        </div>
    </div>
    <!-- questa è la sezione "scopri di più" -->
    <div class="discover">
        <h1 id="scopri">Scopri di più su di me...</h1>
        <div class="img">
        <p id="img1">
            <img src="../img/img1.jpg" alt="sfondo">
        </p>
        </div>
        <br>
        <div class="para">
        Sono un ragazzo con la passione per il web design e la programmazione. 
        Sono molto curioso, il che mi porta ad aggiornarmi spesso con le nuove tendenze. 
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa optio provident doloremque nulla ducimus cupiditate minima
         nisi a dolorem quae repellendus ad nesciunt aliquid quod, nam eligendi excepturi earum et?
        </div>
    </div>

    <footer>
    <?php
    require_once 'funzioni.php';
    footer();
    ?>
    </footer>
  
    </body>
</html>