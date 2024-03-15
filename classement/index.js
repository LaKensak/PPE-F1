// Création de la table
const table = document.createElement('table');
table.classList.add('table');

// Ajout d'une ligne d'en-tête
const headerRow = table.createTHead().insertRow();
headerRow.innerHTML = '<th style="color: #3f6bd3;">Place</th><th style="width: 0;"></th><th style="color: #3f6bd3;">Pilote</th><th style="color: #3f6bd3;">Ecurie</th><th style="color: #3f6bd3;">Point</th>';

// Ajout d'une ligne de barre sous l'en-tête
const barRow = table.createTHead().insertRow();
const barCell = barRow.insertCell();
barCell.colSpan = 5;
barCell.innerHTML = '<div style="border-bottom: 2px solid red; color: red; background-color: red;"></div>'; // Ajuster la hauteur et l'épaisseur de la barre ici

// Parcourir le tableau d'objets data
for (const element of data) {
    // Ajout d'une ligne au tableau
    const row = table.insertRow();

    // Ajout de cellules avec les données
    let cellPlace = row.insertCell();
    cellPlace.innerText = element.place;


    let cellLogo = row.insertCell();
    if (element.logoPays) {
        const img = document.createElement('img');
        img.src = '../img/' + element.logoPays;
        img.alt = '';
        img.style.width = '50px';
        img.style.height = '40px';
        cellLogo.appendChild(img);
    }
    

}

// Intégrer la table sur l'interface
document.getElementById('reponse').appendChild(table);
