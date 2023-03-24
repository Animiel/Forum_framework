<?php
$profile = $result["data"]['profile'];
// var_dump($profile); die;
// var_dump($profile->getRegisterdate() );die;
?>

<h1>Profil de <?= $profile->getPseudo() ?> (ID #<?= $profile->getId() ?>)</h1>

<?php if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->hasRole("ROLE_ADMIN") && ($profile->getBanned() != 1 && !$profile->hasRole("ROLE_ADMIN"))) { ?>
        <p class="button">
            <a href="index.php?ctrl=security&action=userBan&id=<?= $id ?>">Bannir</a>
        </p>
   <?php }
} ?>

<p class="profile"><strong>Date d'inscription :</strong> <?= $profile->getRegisterdate() ?><br>
<strong>E-mail :</strong> <?= $profile->getEmail() ?><br>
<strong>Role :</strong> <?= $profile->getRole() ?><br>
<strong>Banni ?</strong> <?= $profile->getBannedText() ?></p>