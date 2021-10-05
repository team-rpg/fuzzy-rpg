<?php require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error_message.html.php"]); ?>

<div>
    <br>
    <span>User firstname: <?= $user->getUserFirstname() ?></span>
    <br>
    <span>User lastname: <?= $user->getUserLastname() ?></span>
    <br>
    <span>User email: <?= $user->getUserEmail() ?></span>
    <br>

    <?php
    if(isset($_SESSION['user']) && $_SESSION['user']['is_admin'] == 1) : ?>
    <a href="<?= sprintf('/user/%d/edit', $user->getUserId()) ?>">Editer l'utilisateur</a>
    <br>
    <a href="<?= sprintf('/user/%d/delete', $user->getUserId()) ?>">Supprimer l'utilisateur</a>
    <?php endif; ?>
</div>