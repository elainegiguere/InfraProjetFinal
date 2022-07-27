<?php 
require_once 'controleurs/recettes.php'; 
$controleurRecettes=new ControleurRecettes;

if (isset($_POST['boutonAjouter'])){
  $controleurRecettes->editer();
}
?>

<?php 
$title = 'page edition de recette';
include_once('include/header.php'); 
?>

<h1>Formulaire d'édition de recette</h1>

<?php
     $controleurRecettes->afficherFormulaireEdition();
?>

<a href="adminRecettes.php">Retour à la liste des recettes</a>

<?php include_once('include/footer.php'); ?>