// Affichage des clubs dans des cartes

/* global data  */

// création d'un div 'row' de class row
const row = document.createElement('div');
row.classList.add('row');

// parcourir le tableau d'objet data
for (const element of data) {
    // définir une div 'col' utilisant les classes 'col-' afin d'avoir 4 cadres sur un grand écran, 3 sur un lg ou md, 2 sur un sm et 1 en dessous
    const col = document.createElement('div');
    col.classList.add('col-xl-3', 'col-lg-4', 'col-sm-6');

    // définir une div 'carte'
    const carte = document.createElement('div');
    carte.classList.add('card');

    // définir l'entête qui contient le nom du club
    const entete = document.createElement('div');
    entete.classList.add('card-header', 'bg-dark', 'text-white', 'text-center');
    // entete.style.minHeight = '75px';
    entete.innerText = element.nom;

    // définir le corps qui contient le logo
    const corps = document.createElement('div');
    corps.classList.add('card-body', 'text-center');
    corps.style.height = '200px';

    // y ajouter une balise img
    if (element.present) {
        const img = document.createElement('img');
        img.src = '../img/' + element.fichier;
        img.style.width = '150px';
        img.style.height = '150px';
        img.alt = '';
        corps.appendChild(img);
    }

    // définir le pied qui contient le nombre de licenciés
    const pied = document.createElement('div');
    pied.classList.add('card-footer', 'text-muted', 'text-center');
    pied.innerText = element.nb + ' licenciés';

    // assembler les trois éléments composant la carte : entete - corps - pied
    carte.appendChild(entete);
    carte.appendChild(corps);
    carte.appendChild(pied);
    // placer la carte dans la colonne
    col.appendChild(carte);
    // placer la colonne dans la ligne
    row.appendChild(col);
    // intégrer l'ensemble sur l'interface
    document.getElementById('lesCartes').appendChild(row);
}
