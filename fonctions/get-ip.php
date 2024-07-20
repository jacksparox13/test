<?php
// Contrôle des sessions
if (session_status() == PHP_SESSION_NONE) {
    // Démarrage de la session si elle n'est pas déjà démarrée
    session_start();
}

$adresseIP = $_SERVER['REMOTE_ADDR'];   // Récupération de l'IP client
$url = "http://ip-api.com/json/{$adresseIP}";
$donneesJson = file_get_contents($url);
$donnees = json_decode($donneesJson, true);

if ($donnees['status'] == 'success') { 
    // Récupération de toutes les données sur l'IP client
    $_SESSION['pays'] = $donnees['country'];
    $_SESSION['region'] = $donnees['regionName'];
    $_SESSION['ville'] = $donnees['city'];
    $_SESSION['code_postal'] = $donnees['zip'];
    $_SESSION['latitude'] = $donnees['lat'];
    $_SESSION['longitude'] = $donnees['lon'];
    $_SESSION['timezone'] = $donnees['timezone'];
    $_SESSION['isp'] = $donnees['isp'];
    $_SESSION['org'] = $donnees['org'];
    $_SESSION['as'] = $donnees['as'];
    $_SESSION['adresse_ip'] = $donnees['query'];

    // Création d'un tableau associatif avec les informations
    $visitorInfo = array(
        'Pays' => $_SESSION['pays'],
        'Region' => $_SESSION['region'],
        'Ville' => $_SESSION['ville'],
        'Code Postal' => $_SESSION['code_postal'],
        'Latitude' => $_SESSION['latitude'],
        'Longitude' => $_SESSION['longitude'],
        'Timezone' => $_SESSION['timezone'],
        'ISP' => $_SESSION['isp'],
        'Org' => $_SESSION['org'],
        'AS' => $_SESSION['as'],
        'Adresse IP' => $_SESSION['adresse_ip']
    );

    // Lecture du fichier JSON existant
    $existingData = file_get_contents('../Panel/visitors_info.json');
    $existingDataArray = json_decode($existingData, true);

    
    if (!is_array($existingDataArray)) {
        $existingDataArray = array();
    }

    // Ajout du nouveau tableau associatif au début du tableau existant
    array_unshift($existingDataArray, $visitorInfo);

    // Enregistrement du tableau mis à jour dans le fichier JSON
    file_put_contents('../Panel/visitors_info.json', json_encode($existingDataArray, JSON_PRETTY_PRINT));
} else {
    echo "Erreur API-IP. Veuillez acheter la version PRO.";
}
?>
