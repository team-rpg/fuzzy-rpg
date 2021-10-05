<?php

namespace App\Controller;

use App\Dao\CharacterDao;
use PDOException;
use App\Model\User;
use App\Dao\UserDao;
use Exception;

class UserController extends AbstractController
{
    public function index(): void
    {
        try {
            $users = (new UserDao())->getAllUsers();
        } catch (PDOException $e) {
            echo $e->getMessage();
            // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

        $this->renderer->render(
            ["layout.html.php"],
            ["user", "index.html.php"],
            ["title" => 'Liste d\'utilisateur', "users" => $users]
        );
    }

    public function new(): void
    {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        if ('GET' === $request_method) {
            ob_start();
            $title = 'Enregistrement utilisateur';
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'user', 'signup.html.php']);
            $content = ob_get_clean();

            // Appeler le layout
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
        } elseif ('POST' === $request_method) {
            $args = [
                "user_firstname" => [],
                "user_lastname" => [],
                "user_email" => [],
                "user_password" => [],
                "user_confirm_password" => []
            ];

            $userRegister_post = filter_input_array(INPUT_POST, $args);
            if (
                isset($userRegister_post["user_firstname"]) &&
                isset($userRegister_post["user_lastname"])  &&
                isset($userRegister_post["user_email"])     &&
                isset($userRegister_post["user_password"])  &&
                isset($userRegister_post['user_confirm_password'])
            ) {
                if (empty(trim($userRegister_post["user_firstname"]))) {
                    $error_messages[] = "Prénom d'utilisateur inexistant";
                }

                if (empty(trim($userRegister_post["user_lastname"]))) {
                    $error_messages[] = "Nom d'utilisateur inexistant";
                }

                if (empty(trim($userRegister_post["user_email"]))) {
                    $error_messages[] = "Email inexistant";
                }

                if (empty(trim($userRegister_post["user_password"]))) {
                    $error_messages[] = "Mot de passe inexistant";
                }

                if (empty(trim($userRegister_post["user_confirm_password"]))) {
                    $error_messages[] = "Confirmation mot de passe inexistant";
                }
            }

            if ($userRegister_post['user_password'] !== $userRegister_post['user_confirm_password']) {
                $error_messages[] = "Les mots de passes ne correspondent pas.";
            }

            $user = (new User())->setUserFirstname($userRegister_post["user_firstname"])
                ->setUserLastname($userRegister_post["user_lastname"])
                ->setUserEmail($userRegister_post["user_email"])
                ->setUserPassword($userRegister_post["user_password"])
                ->setIsAdmin(0);

            if (empty($error_messages)) {
                try {
                    $id = (new UserDao())->newUser($user);
                    header(sprintf("Location: /user/%d/show", $id));

                    $_SESSION['user']['user_id'] = $id;
                    $_SESSION['user']['user_firstname'] = $userRegister_post["user_firstname"];
                    $_SESSION['user']['user_lastname'] = $userRegister_post["user_lastname"];
                    $_SESSION['user']['user_email'] = $userRegister_post["user_email"];
                    $_SESSION['user']['is_admin'] = $user->getIsAdmin();

                    // Vide le mot de passe :
                    $userRegister_post['user_password'] = "";

                    exit;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                ob_start();
                $title = 'Enregistrement utilisateur';
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'user', 'signup.html.php']);
                $content = ob_get_clean();

                // Appeler le layout
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
            }
        }
    }

    public function signin(): void
    {

        // On regarde si c'est un get ou un post qui nous est envoyé
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        // Si c'est get :
        if ('GET' === $request_method) {
            ob_start();
            $title = 'Connexion utilisateur';
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'user', 'signin.html.php']);
            $content = ob_get_clean();

            // Appeler le layout
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
        } elseif ('POST' === $request_method) {
            $args = [
                "user_email" => [],
                "user_password" => [],
            ];

            // On récupère les données envoyé en post
            $userRegister_post = filter_input_array(INPUT_POST, $args);

            if (
                isset($userRegister_post["user_email"])     &&
                isset($userRegister_post["user_password"])
            ) {
                if (empty(trim($userRegister_post["user_email"]))) {
                    $error_messages[] = "Email inexistant";
                }
                if (empty(trim($userRegister_post["user_password"]))) {
                    $error_messages[] = "Mot de passe inexistant";
                }
            }

            if (empty($error_messages)) {

                // Vérifier si l'email existe en base de donnée
                $user = (new UserDao())->getUserByEmail($userRegister_post['user_email']);

                if (!$user) {
                    $error_messages[] = "Email ou mot de passe incorrect.";
                }

                if (empty($error_messages)) {
                    // Si l'email a été trouvé

                    $is_password_correct = password_verify($userRegister_post['user_password'], $user->getUserPassword());

                    if (!$is_password_correct) {
                        $error_messages[] = "Email ou mot de passe incorrect.";
                    }

                    if (empty($error_messages)) {
                        try {
                            $id = $user->getUserId();
                            header(sprintf("Location: /user/%d/show", $id));

                            $_SESSION['user']['user_id'] = $id;
                            $_SESSION['user']['user_email'] = $userRegister_post["user_email"];
                            $_SESSION['user']['is_admin'] = $user->getIsAdmin();

                            // Vide le mot de passe :
                            $userRegister_post['user_password'] = "";

                            exit;
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                    } else {
                        ob_start();
                        $title = 'Connexion utilisateur';
                        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'user', 'signin.html.php']);
                        $content = ob_get_clean();

                        // Appeler le layout
                        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
                    }
                } else {
                    ob_start();
                    $title = 'Connexion utilisateur';
                    require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'user', 'signin.html.php']);
                    $content = ob_get_clean();

                    // Appeler le layout
                    require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
                }
            } else {
                ob_start();
                $title = 'Connexion utilisateur';
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'user', 'signin.html.php']);
                $content = ob_get_clean();

                // Appeler le layout
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
            }
        }
    }

    public function show(int $id): void
    {
        try {
            $user = (new UserDao())->getUserById($id);

            if (!is_null($user)) {
                // Appeler (inclure) la vue
                ob_start();
                $title = $user->getUserFirstname();
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "user", "show.html.php"]);
                $content = ob_get_clean();

                // Appeler le layout
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
            } else {
                header("Location: /");
                exit;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function edit(int $id): void
    {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        // Récupérer un article en fonction de son id
        try {
            $userDao = new UserDao();
            $user = $userDao->getUserById($id);

            if (is_null($user)) {

                header("Location: /"); // ou error 404
                exit;
            } elseif ('GET' === $request_method) {
                // Appeler (inclure) la vue
                ob_start();
                $title = "Editer {$user->getUserFirstname()}";
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "user", "edit.html.php"]);
                $content = ob_get_clean();

                // Appeler le layout
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
            } elseif ('POST' === $request_method) {
                $args = [
                    "user_firstname" => [],
                    "user_lastname" => [],
                    "user_email" => [],
                    "user_password" => []
                ];

                $userEdit_post = filter_input_array(INPUT_POST, $args);

                if (isset($userEdit_post["user_password"]) && isset($userEdit_post["user_firstname"]) && isset($userEdit_post["user_lastname"]) && isset($userEdit_post["user_email"])) {

                    if (empty(trim($userEdit_post["user_password"]))) {
                        $error_messages[] = "Mot de passe inexistant";
                    }

                    if (empty(trim($userEdit_post["user_firstname"]))) {
                        $error_messages[] = "Prénom d'utilisateur inexistant";
                    }

                    if (empty(trim($userEdit_post["user_lastname"]))) {
                        $error_messages[] = "Nom d'utilisateur inexistant";
                    }

                    if (empty(trim($userEdit_post["user_email"]))) {
                        $error_messages[] = "Email inexistant";
                    }
                }

                $user = (new User())
                    ->setUserFirstname($userEdit_post["user_firstname"])
                    ->setUserLastname($userEdit_post["user_lastname"])
                    ->setUserEmail($userEdit_post["user_email"])
                    ->setUserPassword($userEdit_post["user_password"]);

                if (empty($error_messages)) {

                    $userDao->editUser($user);
                    header(sprintf("Location: /user/%d/show", $id));
                    exit;
                } else {

                    ob_start();
                    $title = "Editer {$user->getUserFirstname()}";
                    require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "user", "edit.html.php"]);
                    $content = ob_get_clean();

                    // Appeler le layout
                    require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete(int $id): void
    {
        try {
            $userCharacters = (new CharacterDao())->getAllUserCharacters($id);
        } catch (Exception $e) {
            $e->getMessage();
        }

        try {
            foreach ($userCharacters as $character) {
                (new CharacterDao())->deleteCharacter($character->getId());
            }

            (new userDao())->deleteUser($id);
            header("Location: /");
            exit;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function logout(): void
    {

        ob_start();
        $title = "Déconnexion";
        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "user", "logout.html.php"]);
        $content = ob_get_clean();

        // Appeler le layout
        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
    }

    public function profil(): void {

        try {
            $user = (new UserDao())->getUserByEmail($_SESSION['user']['user_email']);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        try {
            $characters = (new CharacterDao())->getAllUserCharacters($_SESSION['user']['user_id']);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        ob_start();
        $title = "Profil";
        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "user", "profil.html.php"]);
        $content = ob_get_clean();

        // Appeler le layout
        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
    }
}
