<?php

namespace App\Dao;

interface UserDaoInterface {
    public function getAllUserCharacters(int $id): array;
}

