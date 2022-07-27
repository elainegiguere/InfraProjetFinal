<h1>Voici mes recettes affichés en "card"</h1>

<div class="container">
    <div class="row">
        

    <?php
        foreach ($recettes as $recette) {
    ?>
    <div class="col-md-4 p-4">
        <div class="card">
            <img src="https://picsum.photos/200" alt="Aléatoire" style="width:100%">
              <div class="container">
              <p><?= $recette->nom_recette ?></h>
              <h3><?= $recette->theme ?></h3>
                 <p><?= $recette->ingredients?></p>
                 <p><?= $recette->preparation?></p>
                </div>
             </div>
         </div>
    <?php
        }
    ?>
       
    </div>
</div>
