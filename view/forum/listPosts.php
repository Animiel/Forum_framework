<?php

$topic = $result["data"]['topic'];
$posts = $result["data"]['posts'];
?>


<h1><?= $topic->getTitle() ?></h1>
<h2>Liste des messages</h2>

<?php if(!$topic->getClosed() && isset($_SESSION['user'])) { ?>
    <p class="button">
        <a class="ajout" href="index.php?ctrl=forum&action=ajoutPost&id=<?= $id ?>">Ajouter un message</a>
    </p>
<?php } ?>



<?php 
if($posts) {
    foreach ($posts as $post) { ?>
    <div class="msg">
        <label class="messa"><?= $post->getUser()->getPseudo() ?> <?= $post->getDate() ?>
            <p>
                <?= $post->getContenu() ?>
            </p>
        </label>
    </div>
    <?php } ?>
<?php } else { echo "Pas de posts dans ce topic"; } ?>