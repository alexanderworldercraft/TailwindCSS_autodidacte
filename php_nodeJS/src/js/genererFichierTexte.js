function genererFichierTexte(resultatTirage) {
    // Obtenir la date et l'heure actuelles
    let date = new Date();
    let dateStr = date.toLocaleDateString();
    let timeStr = date.toLocaleTimeString();

    // Créer le contenu du fichier texte
    let contenu = `Résultat du tirage du ${dateStr} à ${timeStr}:\n\n`;
    let index = 1;
    for (let donneur in resultatTirage) {
        let receveur = resultatTirage[donneur];
        contenu += `${index}. ${donneur} -> ${receveur}\n`;
        index++;
    }
    
    // Créer un blob à partir du contenu
    let blob = new Blob([contenu], { type: 'text/plain' });

    // Créer une URL pour le blob
    let url = URL.createObjectURL(blob);

    // Créer dynamiquement un lien de téléchargement
    let lienTelechargement = document.createElement('a');
    lienTelechargement.href = url;
    lienTelechargement.download = `resultat_tirage_${dateStr.replace(/\//g, '-')}_${timeStr.replace(/:/g, '-')}.txt`;
    lienTelechargement.textContent = "Télécharger le résultat du tirage";
    lienTelechargement.classList = ('btn btn-primary shadow-lg');

    // Ajouter le lien de téléchargement dans l'élément avec l'ID 'resultat'
    let resultatElement = document.getElementById('resultat');
    resultatElement.appendChild(lienTelechargement);
}