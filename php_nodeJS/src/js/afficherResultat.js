function afficherResultat(resultatTirage) {
    // Trouver l'élément où afficher le résultat
    let resultatElement = document.getElementById('resultat');

    // Créer le tableau dynamiquement
    let tableHTML = `

<table class="table">
    <thead>
        <tr>
            <th class="bg-transparent" scope="col">#</th>
            <th class="bg-transparent" scope="col">Donneurs</th>
            <th class="bg-transparent" scope="col">Receveurs</th>
        </tr>
    </thead>
    <tbody>
`;

    let index = 1;
    for (let donneur in resultatTirage) {
        let receveur = resultatTirage[donneur];
        tableHTML += `
    <tr>
        <th class="bg-transparent" scope="row">${index}</th>
        <td class="bg-transparent">${donneur}</td>
        <td class="bg-transparent">${receveur}</td>
    </tr>
`;
        index++;
    }

    tableHTML += `
    </tbody>
</table>
`;

    // Injecter le tableau dans l'élément 'resultat'
    resultatElement.innerHTML = tableHTML;
}