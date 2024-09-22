<?php
// Afficher les erreurs PHP pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "php/base/BDD.php";

date_default_timezone_set('Europe/Paris');

$dateActuel = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="tabTitle">Tirage au sort de cadeaux</title>
    <?php require_once "php/base/head.php"; ?>
</head>

<body>

    <!-- Fond d'écran -->
    <div id="background"></div>
    <header class="mt-3 mb-5">
        <article class="card bg-transparent border-0">
            <section class="card-body">
                <h5 class="card-title text-center">Génération de répartition de distribution de cadeaux entreprise.</h5>
            </section>
        </article>

        <article>
            <?php require_once "php/base/nav.php"; ?>
        </article>
    </header>

    <main class="2xl:container bg-red-900">

        <?php 
        if (!empty($_GET['getNav'])) {
        $getNav = htmlspecialchars($_GET['getNav']);
        } else {
            $getNav = "accueil";
        }
        ?>

        <script>
        const tabTitle = document.getElementById('tabTitle');
        </script>

        <?php

            switch ($getNav) {
                case 'historique': ?>
        <!-- Script pour mettre le lien de la page en valeur -->
        <script>
        tabTitle.innerText = "Historique";
        const getNavActive = document.getElementById('<?php echo $getNav; ?>');
        </script>
        <?php require_once 'php/centre/historique.php';
                    break;  
                case 'tirage': ?>
        <!-- Script pour mettre le lien de la page en valeur -->
        <script>
        tabTitle.innerText = "tirage";
        const getNavActive = document.getElementById('accueil');
        </script>
        <script src="js/genererFichierTexte.js"></script>
        <div id="resultat" class="mb-5"></div>
        <?php require_once 'php/centre/tirage.php';
                    break;                           
                default: ?>
        <script>
        const getNavActive = document.getElementById('<?php echo $getNav; ?>');
        </script>
        <?php
                    require_once 'php/centre/index.php';
                    ?>
        <script>
        let nbUser = 4;
        </script>

        <script src="js/addPersonne.js"></script>
        <!-- <script src="js/faireTirage.js"></script>
        <script src="js/afficherResultat.js"></script> -->
        <?php
                    break;
            };
            ?>

        <script>
        getNavActive.setAttribute('class', 'nav-link active');
        getNavActive.setAttribute('aria-current', 'page active');
        </script>

    </main>

    <footer class="text-center m-2">
        <p class="card-text">Version 1.0.0 by <a class="lien-github"
                href="https://github.com/alexanderworldercraft">alexanderworldercraft</a></p>
    </footer>

</body>

</html>