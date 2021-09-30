<div>
    <span><?= $user->getUserFirstname() ?></span>
    <span><?= $user->getUserLastname() ?></span>
    <span><?= $user->getUserEmail() ?></span>

    <a href="<?= sprintf('/user/%d/editUser', $article->getId()) ?>">Editer l'utilisateur</a>
    <a href="<?= sprintf('/user/%d/deleteUser', $user->getId()) ?>">Supprimer l'utilisateur</a>
</div>