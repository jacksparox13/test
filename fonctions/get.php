<?php
// Code Copyright by Fastscama
// Utilisez __DIR__ pour obtenir le répertoire du script actuel
$counters_file = __DIR__ . '/counters.json';

// Lire le fichier une seule fois
$counters = json_decode(file_get_contents($counters_file), true);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function get_total_enligne() {
    global $counters;

    $timeout = 60; // Durée d'inactivité en secondes (1 minute)
    $current_time = time();

    foreach ($_SESSION as $user_id => $last_activity_time) {
        if (is_int($last_activity_time) && $current_time - $last_activity_time > $timeout) {
            unset($_SESSION[$user_id]);
        }
    }

    $user_id = session_id();
    $_SESSION[$user_id] = $current_time;

    return count($_SESSION);
}

$total_enligne = get_total_enligne();

function get_total_info() {
    global $counters, $counters_file;

    // Vérifier si le formulaire info a été soumis
    if (isset($_POST['info_submit'])) {
        $counters['info_submissions'] = isset($counters['info_submissions']) ? $counters['info_submissions'] + 1 : 1;
        file_put_contents($counters_file, json_encode($counters));
    }

    return isset($counters['info_submissions']) ? $counters['info_submissions'] : 0;
}

$total_info = get_total_info();


function get_total_carte() {
    global $counters, $counters_file;
   
    if (isset($_POST['carte_submit'])) {
        $counters['carte_submissions'] = isset($counters['carte_submissions']) ? $counters['carte_submissions'] + 1 : 1;
        file_put_contents($counters_file, json_encode($counters));
    }

    return isset($counters['carte_submissions']) ? $counters['carte_submissions'] : 0;
}

$total_carte = get_total_carte();


?>
