<?php require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error_message.html.php"]); ?>

<h1>Bestiaire</h1>
    <div>
        <span>Nom du Monstre: <?= $monster->getName() ?></span>
        <br>
        <span>Vie: <?= $monster->getHealth() ?></span>
        <br>
        <span>Armure: <?= $monster->getMonsterDef() ?></span>
        <br>
        <span>Dégats: <?= $monster->getMonsterDmg() ?></span>
        <br>
        <span>Aperçu du Monstre:</br><img class="MonsterImg" alt="image d'un Monstre" src="<?= $monster->getPicture() ?>"></img></span>
        <br>
        <span>Description: <?= $monster->getDesc() ?></span>
        <br>
        <span>Catégorie du Monstre: <?= $monster->getCategoryName() ?></span>
        <br>
        <span>Description de la catégorie: <?= $monster->getCategoryDesc() ?></span>
        <br>
</div>
<br>