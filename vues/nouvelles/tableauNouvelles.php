<!-- Affichage en mode "liste" -->

<div class="container">
<table>
    <?php
        foreach ($nouvelles as $nouvelle) {
    ?>
        <tr>
            <td><h3><?= $nouvelle->titre ?> <span></span></h3></td>
            <td><?= $nouvelle->date_nouvelle ?></td>
            <td><?= $nouvelle->description_courte?></td>
            <td><a href="nouvelle.php?id=<?= $nouvelle->id ?>">Lire plus</a></td>
        </tr>
    <?php
        }
    ?>
 </table>
</div>