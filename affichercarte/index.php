<?php
// activation du chargement dynamique des ressources
require $_SERVER['DOCUMENT_ROOT'] . "/include/autoload.php";

// alimentation de l'interface
$titreFonction = "Affichage des données en mode carte";
$retour = "../../index.php";

$sql = <<<EOD
           SELECT id, nom, fichier, (select count(*) from coureur where coureur.idClub = club.id) as nb
           FROM club
           order by nom;
EOD;

$curseur = new Select();
$lesClubs = $curseur->getRows($sql);

// vérification de la présence du logo
// ajout d'une colonne permettant de vérifier l'existence du logo
$rep = RACINE . "/img";
for ($i = 0; $i < count($lesClubs); $i++) {
    $fichier = $lesClubs[$i]['fichier'];
    $lesClubs[$i]['present'] = $fichier != null && file_exists("$rep/$fichier");
}

$data = json_encode($lesClubs);
$head = <<<EOD
<script>
    let data = $data
</script>
EOD;

// chargement de l'interface
require RACINE . "/include/interface.php";
