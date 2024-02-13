// Création de la table
const table = document.createElement('table');
table.classList.add('table');

// Ajout d'une ligne d'en-tête
const headerRow = table.createTHead().insertRow();
headerRow.innerHTML = '<th style="color: #3f6bd3;">Date</th><th style="width: 0;"></th><th style="color: #3f6bd3;">Grand-Prix</th><th style="color: #3f6bd3;">Résultat</th>';

// Ajout d'une ligne de barre sous l'en-tête
const barRow = table.createTHead().insertRow();
const barCell = barRow.insertCell();
barCell.colSpan = 4;
barCell.innerHTML = '<div style="border-bottom: 2px solid red; color: red; background-color: red;"></div>'; // Ajuster la hauteur et l'épaisseur de la barre ici

// Parcourir le tableau d'objets data
for (const element of data) {
    // Ajout d'une ligne au tableau
    const row = table.insertRow();

    // Ajout de cellules avec les données
    let cellDate = row.insertCell();
    cellDate.innerText = element.dateFr;

    let cellLogo = row.insertCell();
    if (element.logoPays) {
        const img = document.createElement('img');
        img.src = '../img/' + element.logoPays;
        img.alt = '';
        img.style.width = '50px';
        img.style.height = '40px';
        cellLogo.appendChild(img);
    }

    let cellNom = row.insertCell();
    cellNom.innerText = element.nom;

    let cellResultat = row.insertCell();
    // Création du bouton pour le résultat
    const btnResultat = document.createElement('button');
    btnResultat.innerHTML = '<span class="result">Classement</span>';
    btnResultat.classList.add('btn', 'btn-outline-danger', 'btn-lg', 'rounded');
    btnResultat.addEventListener('click', () => {
        // afficher une modale avec les classements

    });
    cellResultat.appendChild(btnResultat);
}

// Intégrer la table sur l'interface
document.getElementById('reponse').appendChild(table);
