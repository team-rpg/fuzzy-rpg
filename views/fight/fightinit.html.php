<?php require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error_message.html.php"]); ?>

<h1> FIGHT! </h1>
<h2> Choisissez les deux adversaires :</h2>
<form action="/fight" method="POST">

    <div class="form-item">
        <label for="opponent1">Adversaire 1 :</label>
        <select id="opponent1" name="opponent1">
            <?php foreach ($characters as $character) : ?>
                <option value=<?= $character->getId() ?>><?= $character->getName()?>, <?=$character->getClassName()?> de niveau <?=$character->getLevel()?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-item">
        <label for="opponent2">Adversaire 2 :</label>
        <select id="opponent2" name="opponent2">
            <?php foreach ($monsters as $monster) : ?>
                <option value=<?= $monster->getId() ?>><?= $monster->getName()?>, <?=$monster->getCategoryName()?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <input type="submit" value="Combattre !">


</form>