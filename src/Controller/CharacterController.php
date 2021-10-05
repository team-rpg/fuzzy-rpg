<?php

namespace App\Controller;

use Exception;
use App\Dao\CharacterDao;

class CharacterController extends AbstractController {

    public function createCharacter() {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        if ('GET' === $request_method) {

            try {
                $classes = (new CharacterDao())->getClassesName();
            } catch (Exception $e) {
                echo $e->getMessage();
            }

            // ob_start();
            // $title = 'Création de personnage';
            // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'user', 'createCharacter.html.php']);
            // $content = ob_get_clean();

            // // Appeler le layout
            // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);

            $this->renderer->render(
                ["layout.html.php"],
                ["user", "createCharacter.html.php"],
                ["title" => 'Création de personnage', "classes" => $classes]
            );

        } elseif ('POST' === $request_method) {
            $args = [
                "character_nickname" => [],
                "character_class_id" => [],
            ];

            $character_post = filter_input_array(INPUT_POST, $args);

            if (
                isset($character_post["character_nickname"]) &&
                isset($character_post["character_class_id"])
            ) {

                if (empty(trim($character_post["character_nickname"]))) {
                    $error_messages[] = "Pseudo du personnage inexistant";
                }

                if (empty(trim($character_post["character_class_id"])) || $character_post["character_class_id"] == "null") {
                    $error_messages[] = "Classe inexistante";
                }
            }

            // Vérifier si le nom du personnage est déjà prit
            try {
                $charactersNameList = (new CharacterDao())->getAllCharactersName();
            } catch (Exception $e) {
                $e->getMessage();
            }

            foreach ($charactersNameList as $characterName) {
                if($characterName['character_nickname'] == $character_post['character_nickname']) {
                    $error_messages[] = "Nom déjà prit !";
                    break;
                }
            }

            if(empty($error_messages)) {
                
                try {
                    (new CharacterDao())->createCharacter($character_post['character_nickname'], $character_post['character_class_id'], $_SESSION['user']['user_id']);

                    header('Location: /user/profil');

                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            } else {

                try {
                    $classes = (new CharacterDao())->getClassesName();
                } catch (Exception $e) {
                    echo $e->getMessage();
                }

                // ob_start();
                // $title = 'Enregistrement utilisateur';
                // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'user', 'createCharacter.html.php']);
                // $content = ob_get_clean();

                // // Appeler le layout
                // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);

                $this->renderer->render(
                    ["layout.html.php"],
                    ["user", "createCharacter.html.php"],
                    ["title" => 'Enregistrement utilisateur', "classes" => $classes]
                );
            }
        }
    }

    public function deleteCharacter(int $id) {

        try {
            $delete_character = (new CharacterDao())->deleteCharacter($id);

            if($delete_character == true) {
                header('Location: /user/profil');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}