<?php require_once 'controleurs/recettes.php'; ?>

<?php 
$title = 'page recettes';
include_once('include/header.php'); 
?>




    <?php
         $controleur=new ControleurRecettes;
         $controleur->afficherTableau();
    ?>
    
 <?php include_once('include/footer.php'); ?>