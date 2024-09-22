function addPersonne(number) {
    while (number > 0) {

        nbUser++;

        // Création de l'élément div
        const newNbUserBox = document.createElement('div');
        newNbUserBox.setAttribute('class', 'mb-3');

        // Création de l'élément label
        const newLabel = document.createElement('label');
        newLabel.setAttribute('for', `nbUser0${nbUser}`);
        newLabel.setAttribute('class', `form-label`);
        newLabel.textContent = `Personne 0${nbUser}`;

        // Création de l'élément input
        const newInput = document.createElement('input');
        newInput.setAttribute('type', `text`);
        newInput.setAttribute('class', `form-control user`);
        newInput.setAttribute('id', `nbUser0${nbUser}`);
        newInput.setAttribute('name', `nbUser0${nbUser}`);
        newInput.setAttribute('placeholder', `Personne 0${nbUser}`);
        newInput.setAttribute('required', '');

        // Place l'élément créer plus tôt
        container_nbUser.appendChild(newNbUserBox);
        newNbUserBox.appendChild(newLabel);
        newNbUserBox.appendChild(newInput);

        number--;
    }
}