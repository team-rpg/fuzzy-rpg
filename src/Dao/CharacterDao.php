<?php

namespace App\Dao;

use PDO;

class CharacterDao extends AbstractDao {

    public function getAllUserCharacters(int $id): array {

        $request = $this->pdo->prepare("SELECT * FROM character WHERE user_id = :user_id");
        $request->execute(array(
            ":user_id" => $id
        ));

        return $request->fetchAll(PDO::FETCH_CLASS, Character::class);
    }
}