<?php
// activation du chargement dynamique des ressources
require $_SERVER['DOCUMENT_ROOT'] . "/include/autoload.php";

// alimentation de l'interface
$titreFonction = "Affichage des données en mode tableau";
$retour = "../../index.php";


$select = new Select();
$sql = <<<EOD
    SELECT pilote.nom, pilote.prenom, pays.logoPays, resultat.place, resultat.point
    FROM pilote
    JOIN pays ON pilote.idPays = pays.code
    JOIN resultat ON pilote.id = resultat.idPilote;
EOD;


$lesClassement = $select->getRows($sql);

// vérification de la présence du logo
// ajout d'une colonne permettant de vérifier l'existence du logo
$rep = RACINE . "/img";
for ($i = 0; $i < count($lesClassement); $i++) {
    $fichier = $lesClassement[$i]['logoPays'];
    $lesClassement[$i]['present'] = $fichier != null && file_exists("$rep/$fichier");
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
