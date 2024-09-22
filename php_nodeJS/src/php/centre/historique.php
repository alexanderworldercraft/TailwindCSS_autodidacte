<!-- Code pour la liste des tirages -->
<?php

// Clé de connexion
$cnx = mysqli_connect("mariadb_ts", "alex", "@ZeRtY123", "php_nodeJS_ts");

// Vérifier la connexion, et afficher un message d'erreur si elle échoue
if(mysqli_connect_errno()) {
    echo "erreur de connexion à la base ".mysqli_connexion_error();
}

// Calculer le Nombre Total
$sql_count = "SELECT COUNT(DISTINCT TirageID) AS total
              FROM Tirage";
     
$resultat_count = mysqli_query($cnx, $sql_count);
$row = mysqli_fetch_assoc($resultat_count);
$tirage_total = $row['total'];

// Définir la Pagination
$tirage_par_page = 10;
$nombre_pages = ceil($tirage_total / $tirage_par_page);

// Déterminer sur quelle page on se trouve
$page_actuelle = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page_actuelle = max($page_actuelle, 1);
$page_actuelle = min($page_actuelle, $nombre_pages);

// Calculer le premier index dans la base de données pour la page actuelle
$premier = max(0, ($page_actuelle - 1) * $tirage_par_page);

// Définir la requête SQL
$sql = "SELECT TirageID, Date
        FROM Tirage
        ORDER BY TirageID DESC
        LIMIT $premier, $tirage_par_page;";

// Exécuter la requête SQL
$result = mysqli_query($cnx, $sql);

$i = 0;
?>
<article class="card border-0 bg-transparent">
    <section class="card-body">
        <?php
    while($row = mysqli_fetch_assoc($result)) {
    
        $i++;
        ?>
        <div class="card border-primary rounded-4 bg-transparent mb-4 shadow-lg">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h3 class="card-tilte"><?php echo "Tirage n°" . $row['TirageID'] . " du " . $row['Date']; ?></h3>

                    <a href="#" class="btn btn-primary" data-vue-target="#vue<?php echo $i; ?>">Voir la liste</a>
                </div>
                <?php
    
        $id = $row['TirageID'];
    
        // Définir la requête SQL
        $sql_personne = "SELECT p.Nom AS Donneur, pe.Nom AS Receveur
                         FROM TiragePersonne tp
                         JOIN Personne p ON p.PersonneID = tp.DonneurID
                         JOIN Personne pe ON pe.PersonneID = tp.ReceveurID
                         WHERE tp.TirageID = $id
                         ORDER BY tp.TiragePersonneID ASC;";

        // Exécuter la requête SQL
        $resultat_personne = mysqli_query($cnx, $sql_personne);
        ?>
                <div id="vue<?php echo $i; ?>" class="vue">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center bg-transparent border-primary">Donneur</th>
                                <th class="text-center bg-transparent border-primary"></th>
                                <th class="text-center bg-transparent border-primary">Receveur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
        while($row_personne = mysqli_fetch_assoc($resultat_personne)) {
            ?>
                            <tr>
                                <td class="text-center bg-transparent border-primary text-secondary-emphasis">
                                    <?php echo $row_personne['Donneur']; ?></td>
                                <td class="text-center bg-transparent border-primary text-secondary-emphasis">=></td>
                                <td class="text-center bg-transparent border-primary text-secondary-emphasis">
                                    <?php echo $row_personne['Receveur']; ?></td>
                            </tr>
                            <?php
        }
        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    </section>
</article>

<?php
// Libérer la mémoire associée au résultat
mysqli_free_result($result);

// Fermer la connexion à la base de données
mysqli_close($cnx);
?>

<!-- Pagination de l'historique -->
<nav aria-label="Navigation des pages" class="mx-3">
    <ul class="pagination">
        <!-- Bouton Précédent -->
        <?php if ($page_actuelle > 1): ?>
        <li class="page-item"><a class="page-link" href="?getNav=historique&page=1">1</a></li>
        <?php endif; ?>

        <?php if ($page_actuelle > 3): ?>
        <li class="page-item"><a class="page-link" href="#">...</a></li>
        <?php endif; ?>

        <!-- Deux pages avant la page actuelle -->
        <?php for ($i = max(2, $page_actuelle - 2); $i < $page_actuelle; $i++): ?>
        <li class="page-item"><a class="page-link"
                href="?getNav=historique&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>

        <!-- Page actuelle -->
        <li class="page-item active"><a class="page-link"
                href="?getNav=historique&page=<?php echo $page_actuelle; ?>"><?php echo $page_actuelle; ?></a>
        </li>

        <!-- Deux pages après la page actuelle -->
        <?php for ($i = $page_actuelle + 1; $i <= min($page_actuelle + 2, $nombre_pages - 1); $i++): ?>
        <li class="page-item"><a class="page-link"
                href="?getNav=historique&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endfor; ?>


        <?php if ($page_actuelle < ($nombre_pages - 3)): ?>
        <li class="page-item"><a class="page-link" href="#">...</a></li>
        <?php endif; ?>
        <!-- Bouton Suivant -->
        <?php if ($page_actuelle < $nombre_pages): ?>
        <li class="page-item"><a class="page-link"
                href="?getNav=historique&page=<?php echo $nombre_pages; ?>"><?php echo $nombre_pages; ?></a>
        </li>
        <?php endif; ?>
    </ul>
</nav>

<!-- Script pour "afficher/désafficher" -->
<script>
// Écoutez les événements de clic sur les éléments avec 'data-vue-target'
document.addEventListener("DOMContentLoaded", function() {
    var buttons = document.querySelectorAll('[data-vue-target]');

    buttons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // empêche le comportement par défaut du lien

            // Récupère l'élément cible via l'attribut 'data-vue-target'
            var targetId = button.getAttribute('data-vue-target');
            var targetElement = document.querySelector(targetId);

            // Basculer la visibilité de l'élément cible
            if (targetElement.style.display === 'none' || targetElement.style.display === '') {
                targetElement.style.display = 'block';
                button.setAttribute('class', 'btn btn-outline-danger');
                button.innerHTML = 'Fermer la liste';
            } else {
                targetElement.style.display = 'none';
                button.setAttribute('class', 'btn btn-primary');
                button.innerHTML = 'Voir la liste';
            }
        });
    });
});
</script>