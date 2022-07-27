<?php

require_once './modeles/recettes.php';

class ControleurRecettes {

    function afficherCard() {

        $recettes = modele_recette::ObtenirTous();
        require './vues/recettes/cardRecettes.php';
    }

    function afficherTableau() {
        $recettes = modele_recette::ObtenirTous();
        require './vues/recettes/tableauRecettes.php';

    }


    function afficherTableauAdmin() {
        $recettes = modele_recette::ObtenirTous();
        require './vues/recettes/tableauRecettesAdmin.php';
    }


    /***
     * Fonction permettant de récupérer l'ensemble des produits et de les afficher sous forme de tableau avec boutons d'actions
     */
    function afficherFiche() {
        if(isset($_GET["id"])){
        $recette = modele_recette::ObtenirUn($_GET['id']);
        require './vues/recettes/fiche.php';
    } else {
        $erreur = "La recette à afficher est manquant dans l'url";
        require './vues/erreur.php';
    }
    }



     /***
     * Fonction permettant de récupérer une recette à partir de l'identifiant (id) 
     * inscrit dans l'URL, et l'affiche dans un formulaire pour édition
     */
    function afficherFormulaireEdition(){
        if(isset($_GET["id"])) {
            $recette = modele_recette::ObtenirUn($_GET["id"]);
            if($recette) {  // ou if($recette != null)
                require './vues/recettes/formulaireEdition.php';
            } else {
                $erreur = "Aucune recette trouvé";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "L'identifiant (id) de la recette à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }

    /***
     * Fonction permettant de récupérer une recette à partir de l'identifiant (id) 
     * inscrit dans l'URL, et l'affiche dans un formulaire pour suppression
     */
    function afficherFormulaireSuppression(){
        if(isset($_GET["id"])) {
            $recette = modele_recette::ObtenirUn($_GET["id"]);
            if($recette) {  // ou if($recette != null)
                require './vues/recettes/formulaireSuppression.php';
            }
        } else {
            $erreur = "L'identifiant (id) de la recette à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }


     /***
     * Fonction permettant d'ajouter une recette (validation du formulaire)
     */
    function ajouter() {
        if(isset($_POST['nom_recette']) && isset($_POST['ingredients']) && isset($_POST['preparation']) && isset($_POST['id-theme'])) {
            $message = modele_recette::ajouter($_POST['nom_recette'], $_POST['ingredients'], $_POST['preparation'], $_POST['id_theme']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter une recette. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

    /***
     * Fonction permettant d'editer une recette
     */
    function editer() {
        if(isset($_GET['id'], $_POST['nom_recette']) && isset($_POST['ingredients']) && isset($_POST['preparation']) && isset($_POST['id-theme'])) {
            $message = modele_recette::editer($_GET['id'], $_POST['nom_recette'], $_POST['ingredients'], $_POST['preparation'], $_POST['id_theme']);
            echo $message;
        } else {
            $erreur = "Impossible d'éditer une recette. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

    /***
     * Fonction permettant de supprimer une recette
     */
    function supprimer() {
        if(isset($_GET['id'])) {
            $message = modele_recette::supprimer($_GET['id']);
            echo $message;
        } else {
            $erreur = "Impossible de supprimer la recette. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }



}