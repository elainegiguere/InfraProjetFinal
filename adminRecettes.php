<?php require_once 'controleurs/recettes.php'; ?>

<?php 
$title = 'administration recettes';
include_once('include/header.php'); 
?>




    <?php
         $controleur=new ControleurRecettes;
         $controleur->afficherTableauAdmin();
    ?>
 
 <?php include_once('include/footer.php'); ?>