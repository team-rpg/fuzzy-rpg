<?php

namespace App\Controller;

use App\Dao\CharacterDao;
use PDOException;
use App\Model\Fight;

class FightController extends AbstractController
{

    public function init(): void
    {
        //Making sure the fight is starting from scratch in SESSION
        unset($_SESSION['fight']);
        try {
            $characters = (new CharacterDao())->getAllCharacters();
        } catch (PDOException $e) {
            echo $e->getMessage();
            // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

        $this->renderer->render(
            ["layout.html.php"],
            ["fight", "fightinit.html.php"],
            ["title" => 'Début du combat', "characters" => $characters]
        );
    }

    public function fight(): void
    {
        // If the fighters have not been stored in SESSION, it means that the fight is just starting
        if (!isset($_SESSION['fight']['opponent1'])) {
            try {
                $opponent1 = (new CharacterDao)->getCharacterById($_POST['opponent1']);
                $opponent2 = (new CharacterDao)->getCharacterById($_POST['opponent2']);
            } catch (PDOException $e) {
                echo $e->getMessage();
                // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
            }
        }
        //TODO: Singleton
        $fight = new Fight($opponent1, $opponent2);
        $this->renderer->render(
            ["layout.html.php"],
            ["fight", "fight.html.php"],
            ["title" => 'Combat en cours', "fight" => $fight, "opponent1" => $opponent1, "opponent2" => $opponent2]
        );
    }
}
