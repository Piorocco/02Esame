<?php
// Imposta il percorso del file di testo in cui verranno salvati i dati
$file = 'dati_contatto.txt';

// Verifica se i dati sono stati inviati tramite il metodo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Crea un stringa con i dati inviati dal modulo
    $dati = "Nome: " . ($_POST['nome'] ?? '') . "\n";
    $dati .= "Cognome: " . ($_POST['cognome'] ?? '') . "\n";
    $dati .= "Sesso: " . ($_POST['sesso'] ?? '') . "\n";
    $dati .= "Città di nascita: " . ($_POST['cittaNascita'] ?? '') . "\n";
    $dati .= "Provincia di nascita: " . ($_POST['provinciaNascita'] ?? '') . "\n";
    $dati .= "Data di nascita: " . ($_POST['dataNascita'] ?? '') . "\n";
    $dati .= "Città di residenza: " . ($_POST['cittaResidenza'] ?? '') . "\n";
    $dati .= "Provincia di residenza: " . ($_POST['provinciaResidenza'] ?? '') . "\n";
    $dati .= "C.A.P.: " . ($_POST['CAP'] ?? '') . "\n";
    $dati .= "Via: " . ($_POST['via'] ?? '') . "\n";
    $dati .= "Telefono: " . ($_POST['cellulare'] ?? '') . "\n";
    $dati .= "Email: " . ($_POST['email'] ?? '') . "\n";
    $dati .= "---------------------------\n"; // Separatore per ogni invio

    // Aggiungi i dati al file di testo
    if (file_put_contents($file, $dati, FILE_APPEND)) {
        echo 'Dati salvati con successo!';
    } else {
        echo 'Errore nel salvataggio dei dati.';
    }
} else {
    echo 'Richiesta non valida.';
}
?>
