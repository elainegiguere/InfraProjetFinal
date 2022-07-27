<!-- Affichage en mode "tableau" -->
<h1>Affichage en mode "tableau recettes admin</h1>
<div class="container">
<table>

        <?php
        foreach ($recettes as $recette) {
    ?>
        <tr>
            <td><h3><?= $recette->nom_recette ?></h3></td>
            <td><?= $recette->theme ?></td> 
            <td><?= $recette->ingredients?></td>
            <td><?= $recette->preparation?></td>

            <td> 
                <a href = "fiche_recette.php?id=<?= $recette->id ?>">Afficher</a>
                |
                <a href = "edition_recette.php?id=<?= $recette->id ?>">Modifier</a>
                |
                <a href = "suppression_recette.php?id=<?= $recette->id ?>">Supprimer</a>
        </td>   
        </tr>
    <?php
        }
    ?>
</table>
</div>
<a href="ajout_recette.php">Ajouter une recette</a>