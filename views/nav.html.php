<nav>
    <?php echo "<a href='/'>Home</a> "; ?>

    <?php
    if (isset($_SESSION) && empty($_SESSION)) {
        echo "<a href='/user/signup'>S'enregistrer</a> ";
        echo "<a href='/user/signin'>Se connecter</a>";
    }
    ?>

    <!-- Une fois connecté  -->
    <?php
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        echo "<a href='/user/profil'>Profil</a>";
    }
    ?>

    <!-- Partie admin -->
    <?php
    if (isset($_SESSION['user']) && isset($_SESSION['user']['is_admin'])) {
        if(!empty($_SESSION['user']) && $_SESSION['user']['is_admin'] == 1)
        echo "<a href='/user/index'>Liste des utilisateurs</a>";
    }
    ?>

    <?php
        echo "<a href='/bestiary/index'>Bestiaire</a>";
    ?>

    <?php
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        echo "<a href='/user/logout'>Déconnexion</a> ";
    }
    ?>
</nav>