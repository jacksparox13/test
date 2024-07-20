<?php
// Assurez-vous de démarrer la session si ce n'est pas déjà fait
session_start();

// Vérifiez l'authentification si nécessaire
include './fonctions/auth.php';

// Vérifiez si les clients existent et ne sont pas vides
if (isset($clients) && !empty($clients)) {
    // Entête du fichier CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="clients.csv"');

    // Ouvrez la sortie en écriture
    $output = fopen('php://output', 'w');

    // En-tête du fichier CSV
    fputcsv($output, array('Date rez', 'Nom', 'Prénom', 'Date de naissance', 'Adresse', 'Ville', 'Code Postal', 'N° Tel', 'N° CC', 'Exp', 'Cvv'));

    // Ajoutez chaque client au fichier CSV
    foreach ($clients as $client) {
        fputcsv($output, $client);
    }

    // Fermez la sortie
    fclose($output);
    exit();
} else {
    // Redirigez ou affichez un message si aucun client n'est disponible
    echo "Aucun client à télécharger.";
}
?>
