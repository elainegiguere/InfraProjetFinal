<?php 
require_once 'controleurs/recettes.php'; 
$controleurRecettes=new ControleurRecettes;

if (isset($_POST['boutonAjouter'])){
  $controleurRecettes->ajouter();
}
?>


<?php 
$title = 'page ajout de recette';
include_once('include/header.php'); 
?>

<h1>Formulaire d'ajout de recette</h1>

<?php
     $controleurRecettes->afficherFormulaireAjout();
?>

<a href="adminRecettes.php">Retour à la liste des recettes</a>

<?php include_once('include/footer.php'); ?>