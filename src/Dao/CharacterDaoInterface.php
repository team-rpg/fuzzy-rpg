<?php

namespace App\Dao;

interface UserDaoInterface {
    public function getAllCharactersName(): array;
    public function getAllUserCharacters(int $id): array;
    public function deleteUserCharacter(): void;
    public function createCharacter(string $character_nickname, int $class_id, int $user_id): void;
    public function getClassesName(): array;
    public function getCharacterArmors(int $characterId): array;
    public function getCharacterWeapons(int $characterId): array;
    public function deleteCharacter(int $id): bool;
}

