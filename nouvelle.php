<?php require_once 'controleurs/nouvelles.php'; ?>

<?php 
$title = 'page single nouvelle';
include_once('include/header.php'); 
?>


    <h1>Single Nouvelle</h1>

    <?php
         $controleur=new ControleurNouvelles;
         $controleur->afficherSingleNouvelle();
    ?>
    
 <?php include_once('include/footer.php'); ?>