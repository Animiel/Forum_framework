<?php

$categories = $result["data"]['categories'];
?>

<h1>Liste des catégories</h1>

<table>
    <thead>
        <tr>
            <th>Nom de la catégorie</th>
            <th>Date de création</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $categorie) { ?>
            <tr>
                <td><a href="index.php?ctrl=forum&action=listTopics&id=<?= $categorie->getId() ?>"><?= $categorie->getNom() ?></a></td>
                <td><?= $categorie->getDate() ?></td>
            </tr>
        <?php } ?>

    </tbody>
</table>