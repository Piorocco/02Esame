<?php
session_start(); // Inizia la sessione per mantenere i dati e gli errori

// Imposta il percorso del file di testo in cui verranno salvati i dati
$file = 'dati_contatto.txt';

$errors = [];
$data = [];

// Verifica se i dati sono stati inviati tramite il metodo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validazione dei campi obbligatori
    if (empty($_POST['nome'])) {
        $errors['nome'] = "Il nome è obbligatorio.";
    } else {
        $data['nome'] = htmlspecialchars($_POST['nome']);  //evita iniazione di codice potenzialmente pericoloso
    }

    if (empty($_POST['cognome'])) {
        $errors['cognome'] = "Il cognome è obbligatorio.";
    } else {
        $data['cognome'] = htmlspecialchars($_POST['cognome']);
    }

    if (empty($_POST['cellulare'])) {
        $errors['cellulare'] = "Il telefono è obbligatorio.";
    } else {
        $data['cellulare'] = htmlspecialchars($_POST['cellulare']);
    }

    if (empty($_POST['email'])) {
        $errors['email'] = "L'email è obbligatoria.";
    } else {
        $data['email'] = htmlspecialchars($_POST['email']);
    }

    // Se ci sono errori, salva gli errori e i dati nella sessione e torna al form
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
        header('Location: ../contatti.php');
        exit();
    }

    // Se non ci sono errori, crea una stringa con i dati inviati dal modulo
    $dati = "Nome: " . ($data['nome'] ?? '') . "\n";
    $dati .= "Cognome: " . ($data['cognome'] ?? '') . "\n";
    $dati .= "Sesso: " . ($_POST['sesso'] ?? '') . "\n";
    $dati .= "Città di nascita: " . ($_POST['cittaNascita'] ?? '') . "\n";
    $dati .= "Provincia di nascita: " . ($_POST['provinciaNascita'] ?? '') . "\n";
    $dati .= "Data di nascita: " . ($_POST['dataNascita'] ?? '') . "\n";
    $dati .= "Città di residenza: " . ($_POST['cittaResidenza'] ?? '') . "\n";
    $dati .= "Provincia di residenza: " . ($_POST['provinciaResidenza'] ?? '') . "\n";
    $dati .= "C.A.P.: " . ($_POST['CAP'] ?? '') . "\n";
    $dati .= "Via: " . ($_POST['via'] ?? '') . "\n";
    $dati .= "Telefono: " . ($data['cellulare'] ?? '') . "\n";
    $dati .= "Email: " . ($data['email'] ?? '') . "\n";
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
