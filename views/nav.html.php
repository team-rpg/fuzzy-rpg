<nav>
    <?php echo "<a href='/'>Home</a> "; ?>

    <?php
    if (!isset($_SESSION) || isset($_SESSION) && empty($_SESSION)) { ?>
        <a href='/user/signup'>S'enregistrer</a>
        <a href='/user/signin'>Se connecter</a>
        <a href='/fight/init'>Lancer un combat</a>
    <?php
    }
    ?>

    <!-- Une fois connecté  -->
    <?php
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
        <a href='/user/profil'>Profil</a>
        <a href='/fight/init'>Lancer un combat</a>
    <?php
    }
    ?>

    <!-- Partie admin -->
    <?php
    if (isset($_SESSION['user']) && isset($_SESSION['user']['is_admin'])) { ?>
        if (!empty($_SESSION['user']) && $_SESSION['user']['is_admin'] == 1)
        <a href='/user/index'>Liste des utilisateurs</a>
    <?php
    }
    ?>
    <a href='/bestiary/index'>Bestiaire</a>

    <?php
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
        <a href='/user/logout'>Déconnexion</a>
    <?php
    }
    ?>
</nav>