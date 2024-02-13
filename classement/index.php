<?php
// activation du chargement dynamique des ressources
require $_SERVER['DOCUMENT_ROOT'] . "/include/autoload.php";

// alimentation de l'interface
$titreFonction = "Affichage des données en mode tableau";
$retour = "../../index.php";

// Récupération  des coureurs : licence, nom prenom, sexe, dateNaissanceFr au format fr, idCategorie, nomClub
$select = new Select();
$sql = <<<EOD
    SELECT pilote.id, pilote.nom, pilote.prenom, pilote.photo, pilote.numeroPilote, pilote.idPays,e.nom,e.idPays,logoPays
    FROM pilote
    JOIN f1.ecurie e on pilote.idPays = e.idPays
    JOIN f1.pays p on pilote.idPays = p.code
EOD;

$lesClubs = $select->getRows($sql);

// vérification de la présence du logo
// ajout d'une colonne permettant de vérifier l'existence du logo
$rep = RACINE . "/img";
for ($i = 0; $i < count($lesClubs); $i++) {
    $fichier = $lesClubs[$i]['logoPays'];
    $lesClubs[$i]['present'] = $fichier != null && file_exists("$rep/$fichier");
}


$data = json_encode($select->getRows($sql));
$head = <<<EOD
<script>
    let data = $data;
</script>
EOD;

// chargement des ressources spécifiques de l'interface
$head .= file_get_contents(RACINE . "/composant/jquery.html");
$head .= file_get_contents(RACINE . "/composant/tablesorter.html");

// $head .= file_get_contents(RACINE . "/composant/datatablebootstrap.html");


// chargement de l'interface
require RACINE . "/include/interface.php";
