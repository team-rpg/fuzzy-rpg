<?php require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error_message.html.php"]); ?>

<h1> FIGHT! </h1>

<?= $actionMessage ?>

Tour de jeu : <?= $fight->getTurn() ?>
<h2><?= $fight->getIsItOpponent1Turn() ? "A votre tour de jouer !" : "Au tour du monstre !" ?></h2>

<h2><?= $opponent1->getName() ?></h2>
<h3><?= $opponent1->getClassName() ?> de niveau <?= $opponent1->getLevel() ?></h3>
<h4><?= $opponent1->getHealth() ?> points de vie restants</h4>
<p>VS</p>
<h4>Votre adversaire :</h4>
<h2><?= $opponent2->getName() ?></h2>
<h3><?= $opponent2->getCategoryName() ?></h3>
<h4><?= $opponent2->getHealth() ?> points de vie restants</h4>

<p>Que voulez-vous faire ?</p>

<p><a href="/fight/<?= $fight->getIsItOpponent1Turn() ? "1" : "2" ?>/attack">Attaquer, comme un adulte responsable !</a></p>
<p><a href="/fight/0/attack">Ne rien faire, comme une poule mouillée !</a></p>
