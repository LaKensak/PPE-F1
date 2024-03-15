<?php
// activation du chargement dynamique des ressources
require $_SERVER['DOCUMENT_ROOT'] . "/include/autoload.php";

// alimentation de l'interface
$titreFonction = "Affichage des données en mode tableau";
$retour = "../../index.php";

// Récupération  des coureurs : licence, nom prenom, sexe, dateNaissanceFr au format fr, idCategorie, nomClub
$select = new Select();
$sql = <<<EOD
    SELECT ecurie.nom, ecurie.logoEcurie
    FROM ecurie
EOD;

////    SELECT ecurie.nom, ecurie.logoEcurie, resultat.place, resultat.point
////    FROM ecurie
////    JOIN pilote ON ecurie.id = pilote.idEcurie
////    JOIN resultat ON pilote.id = resultat.idPilote;

$lesClassementEcurie = $select->getRows($sql);

// vérification de la présence du logo
// ajout d'une colonne permettant de vérifier l'existence du logo
$rep = RACINE . "/img";
for ($i = 0; $i < count($lesClassementEcurie); $i++) {
    $fichier = $lesClassementEcurie[$i]['logoEcurie'];
    $lesClassementEcurie[$i]['present'] = $fichier != null && file_exists("$rep/$fichier");
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
