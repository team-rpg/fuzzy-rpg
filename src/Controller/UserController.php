<?php

namespace App\Controller;

use PDOException;
use App\Model\User;
use App\Dao\UserDao;

class userController {

    public function showAllUsers(): void {
        // try {
        //     $users = (new userDao())->getAllUsers();
        // } catch (PDOException $e) {
        //     echo $e->getMessage();
        //     // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        // }

        // Appeler (inclure) la vue
        ob_start();
        $title = 'Liste d\'utilisateur';
        // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "user", "showUserList.html.php"]);
        $content = ob_get_clean(); // Equivaut à ob_get_content() suivi de ob_end_clean()

        // // Appeler le layout
        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);

        echo "test";
    }

    public function createUser(): void {

        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        if ('GET' === $request_method) {
            ob_start();
            $title = 'Enregistrement utilisateur';
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'user', 'userRegister.html.php']);
            $content = ob_get_clean();

            // Appeler le layout
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
        } elseif ('POST' === $request_method) {
            $args = [
                "user_password" => [],
                "user_firstname" => [],
                "user_lastname" => [],
                "user_email" => []
            ];

            $userRegister_post = filter_input_array(INPUT_POST, $args);

            if (isset($userRegister_post["user_password"]) && isset($userRegister_post["user_firstname"]) && isset($userRegister_post["user_lastname"]) && isset($userRegister_post["user_email"])) {
                
                if (empty(trim($userRegister_post["user_password"]))) {
                    $error_messages[] = "Mot de passe inexistant";
                }

                if (empty(trim($userRegister_post["user_firstname"]))) {
                    $error_messages[] = "Prénom d'utilisateur inexistant";
                }

                if (empty(trim($userRegister_post["user_lastname"]))) {
                    $error_messages[] = "Nom d'utilisateur inexistant";
                }

                if (empty(trim($userRegister_post["user_email"]))) {
                    $error_messages[] = "Email inexistant";
                }
            }

            $user = (new User())->setUserPassword($userRegister_post["user_password"])
            ->setUserFirstname($userRegister_post["user_firstname"])
            ->setUserLastname($userRegister_post["user_lastname"])
            ->setUserEmail($userRegister_post["user_email"]);

            if (empty($error_messages)) {
                try {
                    $id = (new UserDao())->newUser($user);
                    header(sprintf("Location: /user/%d/showUser", $id));
                    exit;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                ob_start();
                $title = 'Enregistrement utilisateur';
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'user', 'userRegister.html.php']);
                $content = ob_get_clean();

                // Appeler le layout
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
            }
        }
    }

    public function showUser(int $id): void {
        try {
            $user = (new UserDao())->getUserById($id);

            if (!is_null($user)) {
                // Appeler (inclure) la vue
                ob_start();
                $title = $user->getUserFirstname();
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "user", "showUser.html.php"]);
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

    public function editUser(int $id): void {
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
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "user", "editUser.html.php"]);
                $content = ob_get_clean();

                // Appeler le layout
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
            } elseif ('POST' === $request_method) {
                $args = [
                    "user_password" => [],
                    "user_firstname" => [],
                    "user_lastname" => [],
                    "user_email" => []
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

                    $user = (new User())->setUserPassword($userEdit_post["user_password"])
                    ->setUserFirstname($userEdit_post["user_firstname"])
                    ->setUserLastname($userEdit_post["user_lastname"])
                    ->setUserEmail($userEdit_post["user_email"]);
                

                if (empty($error_messages)) {

                    $userDao->editUser($user);
                    header(sprintf("Location: /user/%d/showUser", $id));
                    exit;
                } else {

                    ob_start();
                    $title = "Editer {$user->getUserFirstname()}";
                    require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "user", "editUser.html.php"]);
                    $content = ob_get_clean();
    
                    // Appeler le layout
                    require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteUser(int $id): void {

        try {
            (new userDao())->deleteUser($id);
            header("Location: /");
            exit;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}