<nav>
    <?php
    if(isset($_SESSION) && empty($_SESSION['user'])) {
    echo "<a href=''>S'enregistrer</a> ";
    echo "<a href=''>Se connecter</a>";
    }
    ?>

    <!-- Une fois connecté  -->
    <?php
    if(isset($_SESSION) && !empty($_SESSION['user'])) {
    echo "<a href=''>Profil</a>";
    }
    ?>

    <!-- Partie admin -->
    <?php
    if(isset($_SESSION) && !empty($_SESSION['user']) && $_SESSION['user']['is_admin'] === 1)
    echo "<a href=''>Liste des utilisateurs</a>"
    ?>
</nav>