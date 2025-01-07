<?php
// Nome del file JSON dove salvare i dati
$file = 'messages.json';

// Controlla se il metodo è POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ottieni i dati dal form
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validazione semplice
    if (!empty($email) && !empty($message)) {
        // Leggi i dati esistenti dal file JSON
        $existingData = [];
        if (file_exists($file)) {
            $json = file_get_contents($file);
            $existingData = json_decode($json, true) ?? [];
        }

        // Aggiungi il nuovo messaggio
        $newEntry = [
            'email' => $email,
            'message' => $message,
            'timestamp' => date('Y-m-d H:i:s'),
        ];
        $existingData[] = $newEntry;

        // Salva i dati aggiornati nel file JSON
        if (file_put_contents($file, json_encode($existingData, JSON_PRETTY_PRINT))) {
            echo "Dati salvati con successo!";
        } else {
            echo "Errore durante il salvataggio dei dati.";
        }
    } else {
        echo "Per favore compila tutti i campi obbligatori.";
    }
} else {
    echo "Metodo non valido.";
}

$json = file_get_contents('portfolio.json');
$data = json_decode($json, true);
$id = $_GET['id'];

$lavoro = array_filter($data, function($item) use ($id) {
    return $item['id'] == $id;
});

if (!empty($lavoro)) {
    $lavoro = reset($lavoro); // Ottieni il primo elemento
}

