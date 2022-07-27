<h1>Affichage en mode "tableau"</h1>

<div class="container">
<table>
    <?php
        foreach ($recettes as $recette) {
    ?>
        <tr>
            <td><h3><?= $recette->nom_recette ?> <span><?= $recette->theme ?></span></h3></td>
            <!-- <td></td> -->
            <td><?= $recette->ingredients?></td>
            <td><?= $recette->preparation?></td>
        </tr>
    <?php
        }
    ?>
 </table>
</div>