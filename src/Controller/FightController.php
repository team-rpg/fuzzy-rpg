<?php

namespace App\Controller;

use App\Dao\CharacterDao;
use App\Dao\MonsterDao;
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
            $monsters = (new MonsterDao())->getAllMonsters();
        } catch (PDOException $e) {
            echo $e->getMessage();
            // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

        $this->renderer->render(
            ["layout.html.php"],
            ["fight", "fightinit.html.php"],
            ["title" => 'Début du combat', "characters" => $characters, "monsters" => $monsters]
        );
    }

    public function fight(): void
    {
        // If the fighters have not been stored in SESSION, it means that the fight is just starting
        if (!isset($_SESSION['fight']['opponent1Id']) || !isset($_SESSION['fight']['opponent2Id'])) {
            try {
                $opponent1 = (new CharacterDao)->getCharacterById($_POST['opponent1']);
                $opponent2 = (new MonsterDao)->getMonsterById($_POST['opponent2']);
            } catch (PDOException $e) {
                echo $e->getMessage();
                // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
            }
        }


        $fight = Fight::getInstance();
        $fight->setOpponent1($opponent1);
        $fight->setOpponent2($opponent2);
        $fight->setIsItOpponent1Turn(True);
        $fight->setTurn(1);

        $_SESSION['fight']['opponent1Id'] = $_POST['opponent1'];
        $_SESSION['fight']['opponent2Id'] = $_POST['opponent2'];
        $_SESSION['fight']['isItOpponent1Turn'] = $fight->getIsItOpponent1Turn();
        $_SESSION['fight']['turn'] = $fight->getTurn();

        $this->renderer->render(
            ["layout.html.php"],
            ["fight", "fight.html.php"],
            ["title" => 'Combat en cours', "fight" => $fight, "opponent1" => $opponent1, "opponent2" => $opponent2]
        );
    }

    public function attack(int $opponentNumber): void
    {
        $actionMessage = "";

        try {
            $opponent1 = (new CharacterDao)->getCharacterById($_SESSION['fight']['opponent1Id']);
            $opponent2 = (new MonsterDao)->getMonsterById($_SESSION['fight']['opponent2Id']);
        } catch (PDOException $e) {
            echo $e->getMessage();
            // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

        if (isset($_SESSION['fight']['opponent1Health'])) {
            $opponent1->setHealth($_SESSION['fight']['opponent1Health']);
        }
        if (isset($_SESSION['fight']['opponent2Health'])) {
            $opponent2->setHealth($_SESSION['fight']['opponent2Health']);
        }

        if ($opponentNumber == 1) {
            $opponent1->attack($opponent2);
            $_SESSION['fight']['opponent2Health'] = $opponent2->getHealth();
        } elseif ($opponentNumber == 2) {
            $opponent2->attack($opponent1);
            $_SESSION['fight']['opponent1Health'] = $opponent1->getHealth();
        } elseif ($opponentNumber == 0) {
        } else {
            throw new Exception("Pas d'adversaire avec ce numéro");
        }

        $fight = Fight::getInstance();
        $fight->setOpponent1($opponent1);
        $fight->setOpponent2($opponent2);
        $fight->setIsItOpponent1Turn($_SESSION['fight']['isItOpponent1Turn']);
        $fight->setTurn($_SESSION['fight']['turn']);
        $fight->nextTurn();

        $_SESSION['fight']['opponent1Id'] = $opponent1->getId();
        $_SESSION['fight']['opponent2Id'] = $opponent2->getId();
        $_SESSION['fight']['isItOpponent1Turn'] = $fight->getIsItOpponent1Turn();
        $_SESSION['fight']['turn'] = $fight->getTurn();

        $this->renderer->render(
            ["layout.html.php"],
            ["fight", "fight.html.php"],
            ["title" => 'Combat en cours', "fight" => $fight, "opponent1" => $opponent1, "opponent2" => $opponent2, "actionMessage" => $actionMessage]
        );
    }
}
