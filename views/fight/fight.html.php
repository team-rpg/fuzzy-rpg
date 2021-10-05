<?php require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error_message.html.php"]); ?>

<h1> FIGHT! </h1>

<h2>Tour de jeu : <?= $fight->getTurn() ?></h2>

<h4>Adversaire 1 :<h4>
<h2><?= $opponent1->getName() ?></h2>
<h3><?= $opponent1->getClassName() ?> de niveau <?= $opponent1->getLevel() ?></h3>
<h4><?= $opponent1->getHealth() ?> points de vie restant
<p>VS</p>
<h4>Adversaire 2 :<h4>
<h2><?= $opponent2->getName() ?></h2>
<h3><?= $opponent2->getClassName() ?> de niveau <?= $opponent2->getLevel() ?></h3>
<h4><?= $opponent2->getHealth() ?> points de vie restant

