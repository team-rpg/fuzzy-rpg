<?php require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error_message.html.php"]); dump($_SESSION);?>

<h1>Profil de <?=$user->getUserFirstname(); ?> </h1>

<h2>Liste des personnages :</h2>

<?php foreach ($characters as $character) : ?>

    

<?php endforeach; ?>