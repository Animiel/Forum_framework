<?php

$posts = $result["data"]['posts'];
?>

<h1>Liste des messages</h1>

<?php foreach ($posts as $post) { 
    //var_dump($post); die; ?>
        <label class="message"><?= $post->getUser()->getPseudo() ?> <?= $post->getDate() ?>
            <p>
                <?= $post->getContenu() ?>
            </p>
        </label>
<?php } ?>