function faireTirage() {
    // Récupérer les valeurs des inputs ayant la classe 'user'
    let inputs = document.querySelectorAll('.user');
    let valeurs = [];
    let champsVides = false;

    inputs.forEach(input => {
        let valeur = input.value.trim();
        if (valeur) {
            valeurs.push(valeur);
        } else {
            champsVides = true;
        }
    });

    // Vérifier s'il y a des champs vides
    if (champsVides) {
        alert("Certains champs sont vides. Veuillez remplir tous les champs.");
        return;
    }

    // Vérifier si le nombre de valeurs est pair et si elles sont uniques
    let valeursUnique = [...new Set(valeurs)];

    if (valeurs.length !== valeursUnique.length) {
        alert("Les valeurs doivent être uniques.");
        return;
    }

    if (valeurs.length % 2 !== 0) {
        alert("Le nombre de valeurs doit être un nombre pair.");
        return;
    }

    // Initialiser les tableaux donneurs et receveurs
    let donneurs = [...valeurs];
    let receveurs = [...valeurs];
    let resultatTirage = {};

    // Boucle pour associer chaque donneur à un receveur
    while (donneurs.length > 0) {
        let indexDonneur = Math.floor(Math.random() * donneurs.length);
        let donneur = donneurs[indexDonneur];

        let indexReceveur;
        let receveur;

        do {
            indexReceveur = Math.floor(Math.random() * receveurs.length);
            receveur = receveurs[indexReceveur];
        } while (receveur === donneur);

        // Associer le donneur au receveur
        resultatTirage[donneur] = receveur;

        // Enlever le donneur et le receveur des tableaux respectifs
        donneurs.splice(indexDonneur, 1);
        receveurs.splice(indexReceveur, 1);
    }

    // Afficher le tableau resultatTirage dans l'élément avec l'ID 'resultat'
    afficherResultat(resultatTirage);

    // Générer le fichier texte et le lien de téléchargement
    genererFichierTexte(resultatTirage);

    return resultatTirage;
}