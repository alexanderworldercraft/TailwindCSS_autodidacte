<?php
// Connexion à la base de données avec PDO
function getDbConnection() {
    $host = 'mariadb_j4'; // Adresse du serveur MySQL
    $db   = 'Cadeaux'; // Nom de la base de données
    $user = 'patrick';// Nom d'utilisateur MySQL
    $pass = '@ZeRtY123';// Mot de passe MySQL
    $charset = 'utf8mb4';// Jeu de caractères

    // DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    // Options pour PDO
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        return new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        exit;
    }
}

function faireTirage($valeurs) {
    // Vérifier s'il y a des champs vides
    if (in_array("", $valeurs)) {
        echo "Certains champs sont vides. Veuillez remplir tous les champs.";
        return;
    }

    // Vérifier si les valeurs sont uniques
    $valeursUnique = array_unique($valeurs);

    if (count($valeurs) !== count($valeursUnique)) {
        echo "Les valeurs doivent être uniques.";
        return;
    }

    // Vérifier si le nombre de valeurs est pair
    if (count($valeurs) % 2 !== 0) {
        echo "Le nombre de valeurs doit être un nombre pair.";
        return;
    }

    // Initialiser les tableaux donneurs et receveurs
    $donneurs = $valeurs;
    $receveurs = $valeurs;
    $resultatTirage = [];

    // Boucle pour associer chaque donneur à un receveur
    while (count($donneurs) > 0) {
        $indexDonneur = array_rand($donneurs);
        $donneur = $donneurs[$indexDonneur];

        do {
            $indexReceveur = array_rand($receveurs);
            $receveur = $receveurs[$indexReceveur];
        } while ($receveur === $donneur);

        // Associer le donneur au receveur
        $resultatTirage[$donneur] = $receveur;

        // Enlever le donneur et le receveur des tableaux respectifs
        unset($donneurs[$indexDonneur]);
        unset($receveurs[$indexReceveur]);

        // Réindexer les tableaux après suppression
        $donneurs = array_values($donneurs);
        $receveurs = array_values($receveurs);
    }

    // Afficher les résultats
    afficherResultat($resultatTirage);

    // Enregistrer le tirage dans la base de données
    try {
        $pdo = getDbConnection();

        date_default_timezone_set('Europe/Paris');

        $dateActuel = date("Y-m-d H:i:s");
        
        // Insérer un nouveau tirage
        $stmt = $pdo->prepare("INSERT INTO Tirage (Date) VALUES (:dateActuel)");
        $stmt->execute([':dateActuel' => $dateActuel]);
        $tirageId = $pdo->lastInsertId();

        // Insérer les donneurs et receveurs dans la table TiragePersonne
        foreach ($resultatTirage as $donneur => $receveur) {
            // Insérer les personnes dans la table Personne si elles n'existent pas encore
            $donneurId = insererPersonneSiNonExistante($pdo, $donneur);
            $receveurId = insererPersonneSiNonExistante($pdo, $receveur);

            // Insérer les paires dans la table TiragePersonne
            $stmt = $pdo->prepare("
                INSERT INTO TiragePersonne (TirageID, DonneurID, ReceveurID)
                VALUES (:tirageId, :donneurId, :receveurId)
            ");
            $stmt->execute([
                ':tirageId'   => $tirageId,
                ':donneurId'  => $donneurId,
                ':receveurId' => $receveurId,
            ]);
        }

        echo "Les résultats du tirage ont été enregistrés dans la base de données.<br>";
    } catch (PDOException $e) {
        echo "Erreur lors de l'enregistrement dans la base de données : " . $e->getMessage();
    }

    // Conversion du tableau associatif en JSON pour affichage
    $jsonResultatTirage = json_encode($resultatTirage);
    ?>
<script>
let resultatTirage = <?php echo $jsonResultatTirage; ?>;
// Générer le fichier texte et le lien de téléchargement
genererFichierTexte(resultatTirage);
</script>
<?php
}

// Fonction pour insérer une personne si elle n'existe pas encore
function insererPersonneSiNonExistante($pdo, $nomPersonne) {
    // Vérifier si la personne existe déjà
    $stmt = $pdo->prepare("SELECT PersonneID FROM Personne WHERE Nom = :nom");
    $stmt->execute([':nom' => $nomPersonne]);
    $personne = $stmt->fetch();

    if ($personne) {
        return $personne['PersonneID']; // Retourner l'ID si la personne existe déjà
    } else {
        // Insérer la personne et retourner son ID
        $stmt = $pdo->prepare("INSERT INTO Personne (Nom) VALUES (:nom)");
        $stmt->execute([':nom' => $nomPersonne]);
        return $pdo->lastInsertId();
    }
}


// Fonction pour afficher le résultat
function afficherResultat($resultatTirage) {
    echo "<h3>Résultat du tirage :</h3>"; ?>
<table class="table table-hover">
    <thead>
        <tr>
            <th class="text-center bg-transparent">Donneur</th>
            <th class="text-center bg-transparent"></th>
            <th class="text-center bg-transparent">Receveur</th>
        </tr>
    </thead>
    <tbody>
        <?php
    foreach ($resultatTirage as $donneur => $receveur) { ?>
        <tr>
            <td class="text-center bg-transparent"><?php echo $donneur; ?></td>
            <td class="text-center bg-transparent">=></td>
            <td class="text-center bg-transparent"><?php echo $receveur; ?></td>
        </tr>
        <?php
    } ?>
    </tbody>
</table>
<?php
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les valeurs dont les noms commencent par 'nbUser'
    $valeurs = [];
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'nbUser') === 0) {
            $valeurs[] = trim($value); // Ajouter les valeurs tout en supprimant les espaces
        }
    }

    // Appeler la fonction de tirage
    faireTirage($valeurs);
}
?>