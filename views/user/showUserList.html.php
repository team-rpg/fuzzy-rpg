<h1>Liste des utilisateurs</h1>
<?php foreach ($users as $user) : ?>
    <user>
        <span><?= $user->getUserFirstname() ?></span>
        <span><?= $user->getUserLastname() ?></span>
        <span><?= $user->getUserEmail() ?></span>
        <a href="<?= sprintf('/user/%d/show', $user->getUserById()) ?>">Voir l'utilisateur</a>
    </user>
<?php endforeach; ?>