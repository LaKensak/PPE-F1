<?php
// activation du chargement dynamique des ressources
require $_SERVER['DOCUMENT_ROOT'] . "/include/autoload.php";

// alimentation de l'interface
$titreFonction = "Affichage des données en mode tableau";
$retour = "../../index.php";


$select = new Select();
$sql = <<<EOD
    Select nom,date_format(date, '%d/%m/%Y') as dateFr
    FROM grandprix
    order by nom,dateFr
EOD;

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
