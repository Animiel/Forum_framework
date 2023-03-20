<?php

$topics = $result["data"]['topics'];
?>

<h1>Liste des sujets</h1>

<?php if ($_GET['action'] == "listTopiCat") { ?>
    <p>
        <a class="ajout" href="index.php?ctrl=forum&action=ajoutTopic&id=<?= $id ?>">Ajouter un topic</a>
    </p>
<?php } ?>

<table>
    <thead>
        <tr>
            <th>Nom du sujet</th>
            <th>Date de création</th>
            <th>Auteur</th>
            <th>Verrouillage</th>
        </tr>
    </thead>
    <tbody>
        
        <?php foreach($topics as $topic ) { ?>
            <tr>
                <td><a href="index.php?ctrl=forum&action=listPosts&id=<?= $topic->getId() ?>"><?=$topic->getTitle()?></a></td>
                <td><?=$topic->getCreationdate()?></td>
                <td><?=$topic->getUser()->getPseudo()?></td>
                <td><?=$topic->getClosedText()?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
