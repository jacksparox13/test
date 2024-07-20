<?php
session_start();
include './fonctions/auth.php';
$clients_file = 'visitors_info.json';
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

    // Assigner les données décodées à la variable $clients
    $clients = $decoded_json;
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
   
    <title>Dashboard | Fast Scama v1.0</title>

    <!-- Liens vers les feuilles de style et polices -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                   
                </nav>
                <div>

        <!-- Barre de recherche  -->
    <label for="search">Rechercher par pays :</label>
    <input type="text" id="search" oninput="searchTable1()" placeholder="Entrez un pays...">
    <span> <label for="searchIP">Rechercher par IP :</label>
    <input type="text" id="searchIP" oninput="searchTable('searchIP', 1)" placeholder="Entrez une adresse IP...">        
    </span>


</div>

                <!-- Tableau de données -->
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                   <th>Pays</th>
                    <th>IP</th>
                    <th>Région</th>
                    <th>Ville</th>
                    <th>Zip</th>
                    <th>ISP</th>
                    <th>Org</th>
                    <th>AS</th>
                </tr>
            </thead>
            <tbody>
            <?php
// Afficher les clients depuis le fichier JSON
foreach ($clients as $client) {
    echo "<tr>";
    echo "<td>{$client['Pays']}</td>";
    echo "<td>{$client['Adresse IP']}</td>";
    echo "<td>{$client['Region']}</td>";
    echo "<td>{$client['Ville']}</td>";
    echo "<td>{$client['Code Postal']}</td>";
    echo "<td>{$client['ISP']}</td>";
    echo "<td>{$client['Org']}</td>";
    echo "<td>{$client['AS']}</td>";
    echo "</tr>";
}
?>
            </tbody>
        </table>
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
    <script src="js/tool.js"></script>









</body>

</html>
