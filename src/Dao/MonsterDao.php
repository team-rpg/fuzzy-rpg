<?php

namespace App\Dao;

use PDO;
use App\Model\Monster;
use App\Dao\AbstractDao;


class MonsterDao extends AbstractDao {

    public function getAllMonsters(): array {

        $monstersData = $this->pdo->query("SELECT *, monster_category_name FROM monster INNER JOIN monster_category ON monster_category.monster_category_id = monster.monster_category_id");

        $fetchedMonsters = $monstersData->fetchAll(PDO::FETCH_ASSOC);

        $monsters = [];

        foreach ($fetchedMonsters as $fetchedMonster) {
            $monster = new Monster();
            $monster->setId($fetchedMonster["monster_id"])
            ->setName($fetchedMonster["monster_name"])
            ->setPicture($fetchedMonster["monster_picture"])
            ->setHealth($fetchedMonster["monster_health"])
            ->setMonsterDef($fetchedMonster["monster_armor"])
            ->setMonsterDmg($fetchedMonster["monster_dmg"])
            ->setDesc($fetchedMonster["monster_desc"])
            ->setCategoryName($fetchedMonster["monster_category_name"])
            ->setCategoryDesc($fetchedMonster["monster_category_desc"]);
            $monsters[] = $monster;
        }

        return $monsters;
    }

    public function getMonsterByName(string $name): Monster {

        $monsterData = $this->pdo->prepare("SELECT *, monster_category_name FROM monster INNER JOIN monster_category ON monster_category.monster_category_id = monster.monster_category_id WHERE monster_name = :monster_name");
        $monsterData->execute([
            ":monster_name" => $name
        ]);

        return $monsterData->fetch(PDO::FETCH_ASSOC);
    }

    public function getMonsterById(int $id): Monster {

        $monsterId = $this->pdo->prepare("SELECT *, monster_category_name, monster_category_desc FROM monster INNER JOIN monster_category ON monster_category.monster_category_id = monster.monster_category_id WHERE monster_id = :monster_id");
        $monsterId->execute([
            ":monster_id" => $id
        ]);

        $fetchedMonster= $monsterId->fetch(PDO::FETCH_ASSOC);
        $monster = new Monster();
        $monster->setId($fetchedMonster["monster_id"])
        ->setName($fetchedMonster["monster_name"])
        ->setPicture($fetchedMonster["monster_picture"])
        ->setHealth($fetchedMonster["monster_health"])
        ->setMonsterDef($fetchedMonster["monster_armor"])
        ->setMonsterDmg($fetchedMonster["monster_dmg"])
        ->setDesc($fetchedMonster["monster_desc"])
        ->setCategoryName($fetchedMonster["monster_category_name"])
        ->setCategoryDesc($fetchedMonster["monster_category_desc"]);

        return $monster;
    }

    public function getAllMonstersCategory(): array {

        $monstersCat = $this->pdo->query("SELECT * FROM monster_category");

        return $monstersCat->fetchAll(PDO::FETCH_ASSOC);
    }
}