<?php
$users = $result["data"]['users'];
// var_dump($users); die;
?>

<h2>Liste des utilisateurs</h2>

<ul>
    <?php 
if($users) {
    foreach ($users as $user) { ?>
        <li>
            <a href="index.php?ctrl=security&action=viewProfile&id=<?= $user->getId() ?>"><?= $user ?></a>
        </li>
    <?php } ?>
<?php } else { echo "Pas d'utilisateurs existants."; } ?>
</ul>