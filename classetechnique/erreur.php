<?php
declare(strict_types=1);

class Erreur
{
    // ------------------------------------------------------------------------------
    // méthodes statiques chargées de rediriger le visiteur vers la page d'erreur ou de renvoyer un message d'erreur au format json
    // pré-condition : disposer d'un script dans le répertoire error chargé de l'affichage et de l'envoi d'un mail à l'administrateur
    // ------------------------------------------------------------------------------

    /**
     * Méthode à utiliser sur les scripts PHP pouvant être appelés en ajax ou directement depuis la barre d'adresse
     * C'est le cas uniquement pour les scripts contrôlant l'accès qui peuvent être inclus dans un script appelé en ajax ou directement depuis la barre d'adresse
     * Rediriger l'utilisateur vers la page erreur/index.php chargé d'afficher l'erreur en mémorisant l'erreur dans une variable de session
     * ou retourne le message dans le format json s'il s'agit d'un appel ajax
     * @param string $libelle Libellé de l'erreur
     */
    public static function afficher(string $libelle): void
    {
        // faut-il rediriger vers la page d'erreur (script appelé directement depuis la barre d'adresse)
        if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {
            $_SESSION['erreur'] = [];
            $_SESSION['erreur']['page'] = $_SERVER['PHP_SELF'];
            $_SESSION['erreur']['message'] = $libelle;
            header("Location:/erreur/erreur.php");
        } else {
            echo $libelle;
        }
        exit;
    }
}
