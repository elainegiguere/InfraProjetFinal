<?php require_once 'controleurs/categories.php'; ?>
<!doctype html> 
<html lang="fr-Ca">
	 <head>
        <!-- Required meta tags -->
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <title><?= $title ?></title> 
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css 		  
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
        <link rel="stylesheet" href="css/style.css">
		
	</head>
 	<body>
<?php session_start(); ?>
<?php
    require_once 'controleurs/authentification.php';

    if (isset($_POST['boutonConnexion'])) {        
        $controleurAuthentification=new ControlleurAuthentification;
        $controleurAuthentification->connecter();
    } else if (isset($_POST['boutonDeconnexion'])) { 
        $controleurAuthentification=new ControlleurAuthentification;
        $controleurAuthentification->deconnecter();
    }

    if (isset($_POST['boutonAjoutUtilisateur'])) {        
      $controleurAuthentification=new ControlleurAuthentification;
      $controleurAuthentification->ajouter();
    }
?>
    <!-- Navigation -->

  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Nouvelles
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
        $controleur=new ControleurCategorie;
        $controleur->afficherListe();
        ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="nouvelles.php">Toutes les nouvelles</a></li>
          </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="recettes.php">Recettes</a>
        </li>

        <!-- Le menu Administration doit s'afficher seulement lorsque l'utilisateur est connecté !-->
       
        <?php if(isset($_SESSION["utilisateur"])) { ?>       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmin" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administration
          </a>
          
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownNouvelles">
            <li><a class="dropdown-item" href="administration_nouvelles.php">Nouvelles</a></li>
            <li><a class="dropdown-item" href="adminRecettes.php">Édition des recettes</a></li>
          </ul>
        </li>
 <!-- La fin du php ici -->
      <?php } ?>

        <li class="nav-item">
          <button class="btn btn-outline-info my-2 my-sm-0" data-bs-toggle="modal" data-bs-target="#modalConnexion">Connexion</button>					
        </li>
      </ul>
    </div>
  </div>
</nav>
  
<!-- Formulaire de connexion -->
<div class="modal" id="modalConnexion" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title">Connexion</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	  </div>
	  <div class="modal-body">
 <!-- début du formulaire -->
		<?php if(!isset($_SESSION["utilisateur"])) { ?>
    <h2>Formulaire d'authentification</h2>
    <form method="POST">
        <label for="utilisateur_login">Utilisateur</label>
        <input type="text" id="utilisateur_login" name="utilisateur_login" required>

        <label for="mot_de_passe_login">Mot de passe</label>
        <input type="password" id="mot_de_passe_login" name="mot_de_passe_login" required>

        <button name="boutonConnexion" type="submit">Connexion</button>
    </form>

<?php } else { ?>
    Vous êtes connecté en tant que <?= $_SESSION["utilisateur"] ?> 
        
    <form method="POST">
        <button name="boutonDeconnexion" type="submit">Déconnexion</button>
    </form>
<?php } ?>
   <!-- fin du formulaire d'authetification -->

 <!-- début du formulaire d'ajout -->
   <h4>Vous m'avez pas de compte? Créez en un !</h4>

<form method="POST">
    <label for="utilisateur_ajout">Utilisateur</label>
    <input type="text" id="utilisateur_ajout" name="utilisateur_ajout" maxlength="100" required>

    <label for="mot_de_passe_ajout">Mot de passe</label>
    <input type="password" id="mot_de_passe_ajout" name="mot_de_passe_ajout" maxlength="255" required>

    
    <label for="utilisateur_ajout">Courriel</label>
    <input type="email" id="courriel_ajout" name="courriel_ajout" maxlength="255" required>

    <button name="boutonAjoutUtilisateur" type="submit">Ajouter l'utilisateur</button>
</form>
  <!-- fin du formulaire d'ajout -->

	  </div>
	  <div class="modal-footer">
		<button type="submit" class="btn btn-primary">Connexion</button>
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
	  </div>
	</div>
  </div>
</div>	

