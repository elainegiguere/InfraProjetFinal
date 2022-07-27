<?php require_once 'controleurs/nouvelles.php'; ?>
<?php include_once('include/header.php'); ?>

  <!-- Page Content -->
  <div class="container">
  
	<?php
        $controleur=new ControleurCategorie;
        $controleur->afficherCategorie();
?>
	<!-- Afficher la liste de toutes nouvelles ACTIVES appartenant à la catégorie sélectionnée en ordre chronologique (de la plus récente à la plus ancienne) -->
	<!-- L'affichage est à votre discrétion -->
	<?php
        $controleur=new ControleurNouvelles;
        $controleur->afficherNouvellesDeLaCategorie();
?>

  </div>

<?php include_once('include/footer.php'); ?>