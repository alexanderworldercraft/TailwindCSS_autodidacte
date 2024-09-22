<?php
// Configuration des paramètres de connexion à la base de données
require "key.php";

// DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Options pour PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Activer les exceptions pour les erreurs
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Mode de récupération par défaut
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Désactiver l'émulation des requêtes préparées
];

try {
    // Établir la connexion à la base de données
    $pdo = new PDO($dsn, $user, $pass, $options);
    //echo "Connexion réussie à la base de données.<br>";
    ?>
    <script>console.log("Connexion réussie à la base de données.");</script>
    <?php

    // Définir les requêtes SQL pour créer les tables
    $sql = "
    CREATE TABLE IF NOT EXISTS Tirage (
        TirageID INT AUTO_INCREMENT PRIMARY KEY,
        Date DATETIME NOT NULL
    ) ENGINE=InnoDB;

    CREATE TABLE IF NOT EXISTS Personne (
        PersonneID INT AUTO_INCREMENT PRIMARY KEY,
        Nom VARCHAR(100) NOT NULL
    ) ENGINE=InnoDB;

    CREATE TABLE IF NOT EXISTS TiragePersonne (
        TiragePersonneID INT AUTO_INCREMENT PRIMARY KEY,
        TirageID INT NOT NULL,
        DonneurID INT NOT NULL,
        ReceveurID INT NOT NULL,
        FOREIGN KEY (TirageID) REFERENCES Tirage(TirageID) ON DELETE CASCADE,
        FOREIGN KEY (DonneurID) REFERENCES Personne(PersonneID) ON DELETE CASCADE,
        FOREIGN KEY (ReceveurID) REFERENCES Personne(PersonneID) ON DELETE CASCADE
    ) ENGINE=InnoDB;
    ";

    // Exécuter les requêtes SQL
    $pdo->exec($sql);
    //echo "Les tables ont été créées ou existent déjà.<br>";
    ?>
    <script>console.log("Les tables ont été créées ou existent déjà.");</script>
    <?php
    
} catch (PDOException $e) {
    // Gérer les erreurs de connexion ou d'exécution des requêtes
    echo "Erreur : " . $e->getMessage();
    exit;
}
?>