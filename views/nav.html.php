<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img class="image-clignote" src="/assets/img/logo_mmo.png" alt="" width="400" height="80" class="d-inline-block align-text-top">
        </a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">🏛 Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href='/bestiary/index'>🐲 Bestiaire</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href=''>|</a>
            </li>

    <?php
        if (!isset($_SESSION) || isset($_SESSION) && empty($_SESSION)) { ?>
            <li class="nav-item">
                <a class="nav-link" href='/user/signin'>Se connecter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href='/user/signup'>S'enregistrer</a>>
            </li>

    <?php
        }
    ?>

        <!-- Une fois connecté  -->
    <?php
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href='/user/profil'>Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href='/fight/init'>Lancer un combat</a>
        </li>

    <?php
        }
    ?>

        <!-- Partie admin -->
    <?php
        if (!empty($_SESSION['user']) && $_SESSION['user']['is_admin'] == 1) { ?>
        <li class="nav-item">
          <a class="nav-link" href='/user/index'>Liste des utilisateurs</a>
        </li>

    <?php
        }
    ?>
        

    <?php
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href='/user/logout'>Déconnexion</a>
        </li>

    <?php
        }
    ?>


        </ul>
    </div>
  </div>
</nav>