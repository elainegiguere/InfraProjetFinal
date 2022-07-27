<?php

require_once './modeles/categories.php';

class ControleurCategorie {

    /***
     * Fonction permettant de récupérer l'ensemble des categories et de les afficher sous forme de liste
     */
    function afficherListe() {
        $categories = modele_categorie::ObtenirToutes();
        require './vues/categories/liste.php';
    }


 
       /***
     * Fonction permettant de récupérer une catégorie à partir de l'identifiant (id) 
     * inscrit dans l'URL, et l'affiche dans un formulaire pour édition
     */
    function afficherCategorie(){
        if(isset($_GET["id"])) {
            $categorie = modele_categorie::ObtenirUn($_GET["id"]);
            if($categorie) {  // ou if($nouvelle != null)
                require './vues/categories/titreCategorie.php';
            } else {
                $erreur = "Aucune categorie trouvé";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "L'identifiant (id) de la catégorie à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }
    
}
?>