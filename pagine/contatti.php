<?php

require_once('funzioni.php');

use Utility as UT;
$inviato = UT::richiestaHTTP("inviato");
$inviato = ($inviato == null || $inviato != 1) ? false : true;

// Inizializzo le variabili
$nome = $cognome = $email = $telefono = ""; 
$clsErroreNome = $clsErroreCognome = $clsErroreEmail = $clsErroreTelefono = "";

if ($inviato) {
    $valido = 0;
    //Recupero i dati
    $nome = UT::richiestaHTTP("nome");
    $cognome = UT::richiestaHTTP("cognome");
    $email = UT::richiestaHTTP("email");
    $telefono = UT::richiestaHTTP("telefono");

    $clsErrore = ' class="errore" ';


    //VALIDO I DATI
    if (($nome != "") && (strlen($nome) <= 25)) {
        $clsErroreNome = "";
    } else {
        $valido++;
        $clsErroreNome = $clsErrore;
        $nome = "";
    }

    if (($cognome != "") && UT::controllaRangeStringa($cognome, 0, 25)) {
        $clsErroreCognome = "";
    } else {
        $valido++;
        $clsErroreCognome = $clsErrore;
        $cognome = "";
    }

    if (($email != "") && UT::controllaRangeStringa($email, 10, 100) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $clsErroreEmail = "";
    } else {
        $valido++;
        $clsErroreEmail = $clsErrore;
        $email = "";
    }

    if (($telefono == "") || UT::controllaRangeStringa($telefono, 5, 20)) {
        $clsErroreTelefono = "";
    } else {
        $valido++;
        $clsErroreTelefono = $clsErrore;
        $telefono = "";
    }

    $inviato = ($valido == 0) ? true : false;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
        <title>Contatti</title>
        <meta name="viewport" content="width=device-width">
        <link href="../css/style.min.css" type="text/css" rel="stylesheet">
        <link rel="icon" href="../img/icon.png">
        <style>
          .errore {
            color: red;
        }
        </style>
    </head> 
<body>
<header>
    <?php
    require_once 'funzioni.php';
    menu();
    ?>
  </header>

      <div class="header">
        <h1 class="lavori">Contattami!</h1>
      </div>
      <!-- questo è il form da compilare per avere le informazioni -->
      <form action="json/salvaDati.php" method="POST" id="form1" novalidate>
        <div class="row">
          <div class="col">
            <fieldset>
              <legend>Dati anagrafici</legend>
              <div><label for="campoNome" <?php echo $clsErroreNome; ?>>Nome: <span>*</span></label></div>
              <div><input type="text" name="nome" placeholder="Nome" id="campoNome" required value="<?php echo $nome; ?>"></div>
              <div><label for="campoCognome" <?php echo $clsErroreNome; ?>>Cognome: <span>*</span></label></div>
              <div><input type="text" name="cognome" placeholder="Cognome" id="campoCognome" required value="<?php echo $cognome; ?>"></div>

              <div>
                <div class="sesso">Sesso</div>
                <label class="radio">Uomo<input type="radio" value="m" name="sesso"></label>
                <label class="radio">Donna<input type="radio" value="d" name="sesso"></label>
              </div>

              <div><label for="labelNato">Nato a:</label></div>
              <div><input type="text" name="cittaNascita" placeholder="Citt&agrave; di nascita" id="labelNato"></div>
              <div><label for="labelProvincia">Provincia di</label></div>
              <div><input type="text" name="provinciaNascita" placeholder="Provincia" id="labelProvincia"></div>

              <div><label for="data">Il:</label></div>
              <div><input type="date" name="dataNascita" id="data"></div>
            </fieldset>
          </div>
          <div class="col">
            <fieldset>
              <legend>Residenza</legend>
              <div><label for="labelCittaResidenza" <?php echo $clsErroreNome; ?>>Citt&agrave;:</label></div>
              <div><input type="text" name="cittaResidenza" placeholder="citt&agrave;" id="labelCittaResidenza"></div>
              <div><label for="labelProvinciaResidenza" <?php echo $clsErroreNome; ?>>Provincia:</label></div>
              <div><input type="text" name="cittaResidenza" placeholder="Provincia" id="labelProvinciaResidenza"></div>
              <div><label for="labelCAP" <?php echo $clsErroreNome; ?>>C.A.P.:</label></div>
              <div><input type="text" name="CAP" placeholder="C.A.P." id="labelCAP"></div>
              <div><label for="labelVia" <?php echo $clsErroreNome; ?>>Via:</label></div>
              <div><input type="text" name="via" placeholder="Via" id="labelVia"></div>
            </fieldset>
            <fieldset>
              <legend>Recapiti</legend>
              <div><label for="cellulare" <?php echo $clsErroreNome; ?>>Telefono: <span>*</span></label></div>
              <div><input type="tel" name="cellulare" placeholder="Numero cellulare" id="cellulare" required value="<?php echo $telefono; ?>"></div>
              <div><label for="email" <?php echo $clsErroreNome; ?>>Email: <span>*</span></label></div>
              <div><input type="email" name="email" placeholder="e-mail" id="email" required value="<?php echo $email; ?>"></div>
            </fieldset> 
          </div>
        </div>
        <div class="formbutton">
          <input type="reset" value="Annulla" class="annullaBtn">
          <input type="submit" value="Conferma" class="confermaBtn">
        </div>
      </form>

      <footer>
    <?php
    require_once 'funzioni.php';
    footer();
    ?>
    </footer>
</body>
</html>