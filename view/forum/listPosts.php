<?php

$posts = $result["data"]['posts'];
?>

<h1>Liste des messages</h1>

<?php foreach ($posts as $post) { ?>
    <div>
        <label><?php $post->getDate() ?>
            <p>
                <?php  ?>
            </p>
        </label>
    </div>
<?php } ?>