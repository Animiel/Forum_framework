<?php

$posts = $result["data"]['posts'];
?>

<h1>Liste des messages</h1>

<?php if ($_GET['action'] == "listPosts") { ?>
    <p>
        <a class="ajout" href="index.php?ctrl=forum&action=ajoutPost&id=<?= $id ?>">Ajouter un message</a>
    </p>
<?php } ?>

<?php foreach ($posts as $post) { ?>
    <label class="message"><?= $post->getUser()->getPseudo() ?> <?= $post->getDate() ?>
        <p>
            <?= $post->getContenu() ?>
        </p>
    </label>
<?php } ?>