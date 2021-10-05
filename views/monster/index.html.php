<?php require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error_message.html.php"]); ?>

<h1>Bestiaire</h1>
<?php foreach ($monsters as $monster) : ?>
    <div>
        <span>Nom du Monstre: <?= $monster->getName() ?></span>
        <br>
        <span>Aperçu du Monstre:<br><img class="MonsterImg" alt="image d'un Monstre" src="<?= $monster->getPicture() ?>"></img></span>
        <br>
        <span>Catégorie du Monstre: <?= $monster->getCategoryName() ?></span>
        <br>
        <a href="<?= sprintf('/bestiary/%d/show', $monster->getId()) ?>">Plus d'informations</a>
    </div>
    <br>
<?php endforeach; ?>