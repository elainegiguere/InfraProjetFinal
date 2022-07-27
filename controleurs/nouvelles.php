<?php

require_once './modeles/nouvelles.php';

class ControleurNouvelles {

   

    function afficherCard() {
        $nouvelles = modele_nouvelle::ObtenirTroisNouvellesActives();
        require './vues/nouvelles/cardNouvelles.php';
    }

    function afficherTableauNouvelleCat() {
        $nouvelles = modele_nouvelle::ObtenirNouvellesParCategorie();
        require './vues/nouvelles/TableauNouvellesCat.php';
    }

    function afficherTableauNouvelle() {
        $nouvelles = modele_nouvelle::ObtenirNouvellesActives();
        require './vues/nouvelles/TableauNouvelles.php';
    }



    /***
     * Fonction permettant de récupérer un proprietaire à partir de l'identifiant (id) 
     * inscrit dans l'URL, et l'affiche dans un formulaire pour édition
     */
    function afficherSingleNouvelle(){
        if(isset($_GET["id"])) {
            $nouvelle = modele_nouvelle::ObtenirUn($_GET["id"]);
            if($nouvelle) {  // ou if($nouvelle != null)
                require './vues/nouvelles/singleNouvelle.php';
            } else {
                $erreur = "Aucune nouvelle trouvé";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "L'identifiant (id) du nouvelle à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }

    /***
     * Fonction permettant de récupérer les nouvelles à partir de l'identifiant de la catégorie (id)
     */
    // afficherNouvellesDeLaCategorie() 
    // a besoin de $_GET["id"] qui représente le numéro de la catégorie

    function afficherNouvellesDeLaCategorie() {
        if(isset($_GET["id"])) {
            $nouvelles = modele_nouvelle::ObtenirNouvellesDeLaCategorie($_GET["id"]);
            if($nouvelles) {  // ou if($nouvelle != null)
                require './vues/nouvelles/tableauNouvellesCat.php';
            } else {
                $erreur = "Aucune nouvelle trouvé";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "L'identifiant (id) du nouvelle à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }
}

?>