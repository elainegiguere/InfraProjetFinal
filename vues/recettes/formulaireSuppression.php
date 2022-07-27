<div class="card">
  <img src="https://picsum.photos/200" alt="une photo aléatoire">
  <div class="container">
    <h3><b><?= $recette->nom_recette ?></b></h3>
    <h4><?= $recette->theme ?></h4>
  </div>
</div>

<form method="POST">
    <button name="boutonSupprimer" type="submit">Supprimer la recette</button><br>
</form>