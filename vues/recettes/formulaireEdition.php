<?php
    require_once 'controleurs/recettes.php';
    
    if (isset($_POST['boutonEditer'])){
      $controleurRecettes=new ControleurRecettes;
      $controleurRecettes->editer();
    }
?>

<?php include_once('include/header.php'); ?>

<div class="container">

<div class="row pt-5">
  <div class="col-md-8">
   <h4> Formulaire d'ajout de nouvelles recettes</h4>
  </div>
</div>
  <div class="formWrapper">
<form method="POST" class="row g-3">
  <div class="col-md-6 pb-2">
    <label for="nom" class="form-label">Nom de la recette</label>
    <input type="text" id="nom" name="nom" required maxlength="50" value="<?=$recette-> nom_recette?>">
  </div>
  <div class="col-md-6 pb-2">
    <label for="ingredients" class="form-label">Ingrédients</label>
    <input type="text" id="ingredients" name="ingredients" required maxlength="1000" value="<?=$recette-> ingredients?>">
  </div>
  <div class="col-12 pb-2">
    <label for="preparation" class="form-label">Préparation</label>
    <input type="text" id="preparation" name="preparation" required maxlength="1000" value="<?=$recette-> preparation?>">
  </div>

  <div class="col-md-4 pb-2">
    <label for="theme" class="form-label">Thème</label>
    <select id="theme_id" name="theme_id">
      <option selected>Themes</option>
      <option value= "1">1 - 30 minutes</option>
      <option value= "2">2 - Pour les enfants</option>
      <option value= "3">3 - Mijoteuse</option>
      <option value= "4">4 - Lunchs</option>
      <option value= "5">5 - BBQ</option>
    </select>
  </div>
 
  <div class="col-12">
    <button name="boutonAjouter" type="submit" class="btn btn-primary">Ajouter</button>
  </div>
</form>
</div>
</div>