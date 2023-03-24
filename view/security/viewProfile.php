<?php
$profile = $result["data"]['profile'];
// var_dump($profile); die;
// var_dump($profile->getRegisterdate() );die;
?>

<h1>Profil de <?= $profile->getPseudo() ?> (ID #<?= $profile->getId() ?>)</h1>

<p class="profile"><strong>Date d'inscription :</strong> <?= $profile->getRegisterdate() ?><br>
<strong>E-mail :</strong> <?= $profile->getEmail() ?><br>
<strong>Role :</strong> <?= $profile->getRole() ?></p>