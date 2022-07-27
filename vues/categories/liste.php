<?php foreach ($categories as $categorie) {  ?> 
            <li> <a href="nouvelles_categorie.php?id=<?= $categorie->id ?>"><?= $categorie-> categorie ?></a></li>
            <?php  } ?>
