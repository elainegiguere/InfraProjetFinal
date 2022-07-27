<?php require_once 'controleurs/nouvelles.php'; ?>
<?php include_once('include/header.php'); ?>

  <!-- Page Content -->
  <div class="container">
  
	<h1 class="my-4">Toutes les nouvelles</h1>
	<!-- Afficher la liste de toutes nouvelles ACTIVES en ordre chronologique (de la plus récente à la plus ancienne) -->
	<!-- L'affichage doit être le même que celui utilisé pour l'affichage des nouvelles par catégorie -->
	<?php
        $controleur=new ControleurNouvelles;
        $controleur->afficherTableauNouvelle();
?>

  </div>

<?php include_once('include/footer.php'); ?>

</html>

