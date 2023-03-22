<?php
$profile = $result["data"]['profile'];
// var_dump($profile); die;
// var_dump($profile->getRegisterdate() );die;
?>

<h1>Profil de <?= $profile->getPseudo() ?> (ID #<?= $profile->getId() ?>)</h1>

<p>Date d'inscription : <?= $profile->getRegisterdate() ?><br>
E-mail : <?= $profile->getEmail() ?><br>
Role : <?= $profile->getRole() ?></p>