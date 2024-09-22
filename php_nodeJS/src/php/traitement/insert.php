<?php
// Configuration de la connexion à la base de données
require "../base/key.php";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Connexion réussie à la base de données.<br>";

    // On récupère les résultats du tirage
    if (isset($_POST['resultatTirage'])) {
        $resultatTirage = json_decode($_POST['resultatTirage'], true);

        // Insérer le tirage dans la table Tirage
        $stmt = $pdo->prepare("INSERT INTO Tirage (Date) VALUES (NOW())");
        $stmt->execute();
        $tirageID = $pdo->lastInsertId(); // Récupérer l'ID du tirage inséré

        // Insérer les participants (donneurs et receveurs) dans la table Personne
        foreach ($resultatTirage as $donneur => $receveur) {
            // Vérifier si le donneur existe déjà dans la table Personne
            $stmt = $pdo->prepare("SELECT PersonneID FROM Personne WHERE Nom = ?");
            $stmt->execute([$donneur]);
            $donneurID = $stmt->fetchColumn();

            if (!$donneurID) {
                // Insérer le donneur s'il n'existe pas
                $stmt = $pdo->prepare("INSERT INTO Personne (Nom) VALUES (?)");
                $stmt->execute([$donneur]);
                $donneurID = $pdo->lastInsertId();
            }

            // Vérifier si le receveur existe déjà dans la table Personne
            $stmt = $pdo->prepare("SELECT PersonneID FROM Personne WHERE Nom = ?");
            $stmt->execute([$receveur]);
            $receveurID = $stmt->fetchColumn();

            if (!$receveurID) {
                // Insérer le receveur s'il n'existe pas
                $stmt = $pdo->prepare("INSERT INTO Personne (Nom) VALUES (?)");
                $stmt->execute([$receveur]);
                $receveurID = $pdo->lastInsertId();
            }

            // Insérer la paire dans la table TiragePersonne
            $stmt = $pdo->prepare("INSERT INTO TiragePersonne (TirageID, DonneurID, ReceveurID) VALUES (?, ?, ?)");
            $stmt->execute([$tirageID, $donneurID, $receveurID]);
        }

        echo "Le tirage a été inséré avec succès dans la base de données.";
    } else {
        echo "Aucun tirage n'a été reçu.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>