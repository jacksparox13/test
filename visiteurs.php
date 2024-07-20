<?php
session_start();
include './fonctions/auth.php';

// Lecture du fichier JSON
$jsonContent = file_get_contents('visitors_info.json');

// Vérifier si la lecture du fichier JSON a réussi
if ($jsonContent === false) {
    die('Erreur lors de la lecture du fichier JSON');
}

// Décodez le JSON
$visitorsInfo = json_decode($jsonContent, true);

// Vérifier si le décodage du JSON a réussi
if ($visitorsInfo === null) {
    die('Erreur lors du décodage du JSON');
}

// Initialisez un tableau pour stocker le nombre de clients par pays
$clientsByCountry = [];

// Bouclez sur les données des visiteurs pour compter le nombre de clients par pays
foreach ($visitorsInfo as $visitor) {
    $country = $visitor['Pays'];
    if (isset($clientsByCountry[$country])) {
        $clientsByCountry[$country]++;
    } else {
        $clientsByCountry[$country] = 1;
    }
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
    <title>Dashboard | Fast Scama v1.0</title>

    <!-- Liens vers les feuilles de style et polices -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Balises de style pour personnaliser le diagramme -->
    <style>
        .custom-chart-container {
            width: 80%; /* Ajustez la largeur selon vos besoins */
            height: 400px; /* Ajustez la hauteur selon vos besoins */
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
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
        </ul>
        
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Nav bar avec mon logo -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- ... (votre code existant) ... -->
                </nav>

                <!-- Contenu principal -->
                <div class="container-fluid">
                    <!-- Centrer le contenu -->
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <!-- Diagramme en barres des visiteurs par pays -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Visiteurs par Pays
                                    </h6>
                                </div>
                                <div class="card-body custom-chart-container">
                                    <!-- Ajout du conteneur pour le diagramme avec une taille personnalisée -->
                                    <canvas id="barChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Récapitulatif total des visites par pays -->
                    <div id="totalVisits">
                      
   <div class="class-text">Récapitulatif total des visites par pays</div>
<?php
// Affichez les informations sur les visiteurs
foreach ($visitors as $country => $count) {
    echo "<h6><span style='color: #4E73DF;'>$country</span> = <span style='color: red;'>$count clients</span></h6><br>";
}
?>

                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Dashboard 2024 | copyright FastScama</span>
                    </div>
                </div>
            </footer>
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

    <!-- Initialisation du diagramme à barres -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Obtenez les données pour le diagramme à partir de PHP
        var countries = <?php echo json_encode(array_keys($clientsByCountry)); ?>;
        var counts = <?php echo json_encode(array_values($clientsByCountry)); ?>;

        // Créez un contexte pour le diagramme
        var ctx = document.getElementById('barChart').getContext('2d');

        // Initialisez le diagramme à barres
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: countries,
                datasets: [{
                    label: 'Nombre de clients par pays',
                    data: counts,
                    backgroundColor: '#4e73df',
                    borderColor: 'black',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>


</body>
</html>
