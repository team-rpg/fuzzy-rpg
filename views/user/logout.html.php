<?php require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error_message.html.php"]); ?>

<?php

$_SESSION = array();
session_destroy();

echo "Vous êtes maintenant déconnecté !";