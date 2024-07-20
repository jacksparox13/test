<?php
session_start();

function incrementerNombreVisiteurs() {
    if (!isset($_SESSION['visiteur_enregistre'])) {
        $fichier = '../Panel/visiteurs.json';
        $donnees = ['total_visiteurs' => lireNombreVisiteurs() + 1];
        file_put_contents($fichier, json_encode($donnees, JSON_PRETTY_PRINT));

       
        $_SESSION['visiteur_enregistre'] = true;
    }
}
?>