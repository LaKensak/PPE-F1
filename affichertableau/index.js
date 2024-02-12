// Affichage des coureurs dans un tableau triable

/* global data  */

import {creerTable} from '/composant/fonction.js';

// récupération des données de l'interface
const reponse = document.getElementById('reponse');

const option = {
    data: data,
    id: 'leTableau',
    style: 'margin:auto',
    headers: {
        nom: 'Grand-Prix',
        dateFr: 'Date',
    },
    headStyle: {
        dateFr: 'text-align: center;',
    },
    bodyStyle: {
        dateFr: 'text-align: center;',
    },
    class: {
        licence: 'masquer',
        sexe: 'masquer',
        dateNaissanceFr: 'masquer',
        nomClub: 'masquer',
    }
};
reponse.appendChild(creerTable(option));

document.getElementById('leTableau').classList.add('tablesorter-bootstrap');
$('#leTableau').tablesorter({
    dateFormat: 'ddmmyyyy',
    headers: {4: {sorter: 'shortDate'}},
});

/*
$('#leTableau').DataTable({
    language: {'url': 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'},
    columnDefs: [{'targets': 4, 'type': 'date-eu'}],
    paging: false,
    bInfo: true,
    aaSorting: [[6, 'asc'], [1, 'asc'], [2, 'asc']]
});
*/
