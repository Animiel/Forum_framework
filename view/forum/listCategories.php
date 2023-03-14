<?php

$topics = $result["data"]['categorie'];
    
?>

<h1>liste catégories</h1>

<?php
foreach($categories as $categorie ){

    ?>
    <p><?=$categorie->getTitle()?></p>
    <?php
}

