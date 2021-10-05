<?php

namespace App\Controller;

use App\Dao\MonsterDao;
use PDOException;


class MonsterController extends AbstractController {

    public function index(): void
    {
        try {
            $monsters = (new MonsterDao())->getAllMonsters();
        } catch (PDOException $e) {
            echo $e->getMessage();
            // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

        $this->renderer->render(
            ["layout.html.php"],
            ["monster", "index.html.php"],
            ["title" => 'Liste des Monstres', "monsters" => $monsters]
        );
    }

    public function show(int $id): void
    {
        try {
            $monster = (new MonsterDao())->getMonsterById($id);
        } catch (PDOException $e) {
            echo $e->getMessage();
            // require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "error500.html.php"]);
        }

        $this->renderer->render(
            ["layout.html.php"],
            ["monster", "show.html.php"],
            ["title" => 'Liste des Monstres', "monster" => $monster]
        );
    }
    
}