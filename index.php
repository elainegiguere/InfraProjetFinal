<?php require_once 'controleurs/nouvelles.php'; ?>
<?php 
$title = 'Accueil de mon projet final';
include_once('include/header.php'); ?>

<div class="container-fluid bgImage">
        <h1 class="text-center">Des nouvelles et des recettes</h1>

</div>


<?php

        $controleur=new ControleurNouvelles;
        $controleur->afficherCard();

        //echo password_hash('motDePasseDesire', PASSWORD_DEFAULT);

?>




<?php include_once('include/footer.php'); ?>