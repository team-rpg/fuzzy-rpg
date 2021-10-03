<?php require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error_message.html.php"]); ?>

<h1>Profil de <?= $user->getUserFirstname(); ?> </h1>

<h2>Liste des personnages :</h2>

<?php foreach ($characters as $character) : ?>
    <div>
        
        <span>Nom: <?= $character->getName() ?></span>
        <br>
        <br>

        <span>Classe: <?= $character->getClassName()  ?></span>
        <br>
        <span>Niveau: <?= $character->getLevel()  ?></span>
        <br>
        <span>Experience: <?= $character->getXp() ?></span>
        <br>
        <span>Vie: <?= $character->getHealth()  ?></span>
        <br>
        <span><?= $character->getSecondaryStatName() ?>: <?= $character->getSecondaryStatValue() ?></span>
        <br>
        <span>Argent: <?= $character->getMoney() ?></span>
        <br>
        <br>

        <span>Equipements: </span>
        <br>
        <br>

        <span>Arme:
            <?php
                foreach ($character->getEquipment() as $key => $equipment) {
                    if($equipment->getType() == "Weapon") {
                        echo "Nom: {$equipment->getName()} ({$equipment->getSubType()})";
                    }
                }
            ?>
        </span>
        <br>
        <span>Casque:
            <?php
                foreach ($character->getEquipment() as $key => $equipment) {
                    if($equipment->getType() == "Armor" && $equipment->getSubType() == "Helmet") {
                        echo "Nom: {$equipment->getName()} ({$equipment->getSubType()})";
                    }
                }
            ?>
        </span>
        <br>
        <span>Armure:
            <?php
                foreach ($character->getEquipment() as $key => $equipment) {
                    if($equipment->getType() == "Armor" && $equipment->getSubType() == "Body") {
                        echo "Nom: {$equipment->getName()} ({$equipment->getSubType()})";
                    }
                }
            ?>
        </span>
        <br>
    </div>

    <a href="<?= sprintf('/user/%d/deleteCharacter', $character->getId()) ?>">Supprimer personnage</a>
    <br>
    =======================================

<?php endforeach; ?>
<br>
<a href="<?= '/user/createCharacter' ?>">Créer personnage</a>