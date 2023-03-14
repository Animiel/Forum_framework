<?php

$categories = $result["data"]['categories'];
    
?>

<h1>liste catégories</h1>

<?php
foreach($categories as $categorie){

    ?>
    <p><?=$categorie->getNom()?></p>
    <?php
}

