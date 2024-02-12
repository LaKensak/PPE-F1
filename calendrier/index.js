// Création de la table
const table = document.createElement('table');
table.classList.add('table');

// Ajout d'une ligne d'en-tête
const headerRow = table.createTHead().insertRow();
headerRow.innerHTML = '<th>Date</th><th style="width: 0;"></th><th>Grand-Prix</th>';

// Ajout d'une ligne de barre sous l'en-tête
const barRow = table.createTHead().insertRow();
const barCell = barRow.insertCell();
barCell.colSpan = 3;
barCell.innerHTML = '<hr style="height: 2.5px; margin: -2px; border: none; background-color: red;">'; // Ajuster la hauteur et l'épaisseur de la barre ici

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
}

// Intégrer la table sur l'interface
document.getElementById('reponse').appendChild(table);
