<?php require_once 'controleurs/recettes.php'; ?>

<?php 
$title = 'fiche recettes';
include_once('include/header.php'); 
?>


<h1>Fiche de la recette<h1>

    <?php
         $controleur=new ControleurRecettes;
         $controleur->afficherFiche();
    ?>
 <?php include_once('include/footer.php'); ?>