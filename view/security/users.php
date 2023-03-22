<?php
$users = $result["data"]['users'];
// var_dump($users); die;
?>

<h2>Liste des utilisateurs</h2>


    
    
    
    <?php 
if($users) {
    foreach ($users as $user) { ?>
            <p>
                <a href=""><?= $user ?></a>
            </p>
    <?php } ?>
<?php } else { echo "Pas d'utilisateurs existants."; } ?>