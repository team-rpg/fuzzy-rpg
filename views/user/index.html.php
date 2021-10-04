<?php require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error_message.html.php"]); ?>

<h1>Liste des utilisateurs</h1>
<?php foreach ($users as $user) : ?>
    <div>
        <span>User firstname: <?= $user->getUserFirstname() ?></span>
        <br>
        <span>User lastname: <?= $user->getUserLastname() ?></span>
        <br>
        <span>User email: <?= $user->getUserEmail() ?></span>
        <br>
        <a href="<?= sprintf('/user/%d/show', $user->getUserId()) ?>">Voir l'utilisateur</a>
</div>
<br>
<?php endforeach; ?>