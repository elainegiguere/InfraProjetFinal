
<div class="container">
    <div class="row">
        

    <?php
        foreach ($nouvelles as $nouvelle) {
    ?>
    <div class="col-md-4 p-4">
        <div class="card">
            <img src="https://picsum.photos/200" alt="photo aléatoire" style="width:100%">
              <div class="container">
              <h2><?= $nouvelle->titre ?></h2>
                 <p><?= $nouvelle->date_nouvelle?></p>
                 <p><?= $nouvelle->description_courte?></p>
                 <a href="nouvelle.php?id=<?= $nouvelle->id ?>">Lire plus</a>
                </div>
             </div>
         </div>
    <?php
        }
    ?>
       
    </div>
</div>
